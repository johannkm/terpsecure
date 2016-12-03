// var messJson = '{  "messages": [{        "_id": "57cf75cea73e494d8675ef91",        "sender": "Johann Miller",      "subject":"Hacking",        "content": "This is a test.",        "read": false    },    {        "_id": "12h124124g523hkjh2232h24",        "sender": "Bill Bob",        "subject": "Test",        "content": "This is another test.",        "read": false    }, {        "_id": "57cf75cea73d494d8675ef91",        "sender": "Evil Corp.",      "subject":"Malicous Content",        "content": "This is a test. Don\'t click <a href=\'google.com\'>Good link!</a>",        "read": true    }]}'

var setMessages = (m) => {
    $("#unread").html(m.length)
    var read = []
    let unreads = 0
    for(x in m){
      read[x] = m[x].read
      if(!read[x]){
        unreads++
      }
    }
    $("#unread").html(unreads)

    let result = ""
    for (x in m) {
        let index = x
        let data = m
        let unreadClass = 'col-unread'
        if (read[index]){
          unreadClass = 'col-read'
        }
            // let s = '<tr><td><h3>'+m[x].sender+'</b></h3></td><td rowspan="1">'+m[x].subject+'</td></tr>'
        let s = '<a id=email' + x + ' class="list-group-item '+unreadClass+'"><h3>' + data[index].sender + '</h3></td><td rowspan="1">' + data[index].subject + '</a>'
        result += s

    }
    $('#messages').html(result)
    for (x in m) {
        let index = x
        let data = m
        $('#email' + index).click(function() {
            $('#messDisplay').html(
              '<li class="list-group-item"><p>'+data[index].content+'</p></li>'
            )
            $('.active').removeClass('active')
            $(this).addClass('active')
            $(this).removeClass('col-unread')
            read[index]=true
            let unreads = 0
            for(r in read){
              if(read[r]==false){
                unreads++
              }
            }
            $("#unread").html(unreads)
        })
    }


}

$.get('emailData.php?user=messages', function(data){
  var messJson = data
  console.log(data)
  var parsed = $.parseJSON(messJson)
  setMessages(parsed.messages)
})

