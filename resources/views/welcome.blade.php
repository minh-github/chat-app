<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.scss') }}">

    <!-- Styles -->
</head>

<body class="antialiased">
    <div class='container' ng-cloak ng-app="chatApp">
        <div class='chatbox' ng-controller="MessageCtrl as chatMessage">
            <div class="chatbox__messages" ng-repeat="message in messages">
                <div class="chatbox__messages__user-message">
                    <div id="chatBox" class="chatbox__messages__user-message--ind-message">
                        <br />
                        @foreach ($chats as $item)
                            <p class="message">{{ $item->author }}: {{ $item->content }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <form id="formSend" method="POST" action="{{ route('chats.store') }}">
                @csrf
                <input name="message" type="text" placeholder="Enter your message">
                <div id="btn-send">send</div>
            </form>
        </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.2/socket.io.js"
    integrity="sha512-zoJXRvW2gC8Z0Xo3lBbao5+AS3g6YWr5ztKqaicua11xHo+AvE1b0lT9ODgrHTmNUxeCw0Ry4BGRYZfXu70weg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var socket = io('http://localhost:6001')
    socket.on('laravel_database_chat', (data) => {
        $('#chatBox').append(`
            <p class="message">${data.data.chat.author}: ${data.data.chat.content}</p>
        `)
    })
    $('#btn-send').on('click', () => {
        let form = $('#formSend')
        let formData = form.serialize();
        $.ajax({
            method: 'POST',
            url: "{{ route('chats.store') }}",
            data: formData,
            // success: function() {
            //     Swal.fire({
            //         icon: 'success',
            //         title: '{{ __('Thành công') }}!',
            //         text: '{{ __('Đã thêm bài khảo sát') }}!',
            //         customClass: {
            //             confirmButton: 'btn btn-success'
            //         },
            //     });
            // },
            // error: function(error) {
            //     Swal.fire({
            //         icon: 'error',
            //         title: '{{ __('Thất bại') }}',
            //         text: error.responseJSON,
            //         customClass: {
            //             confirmButton: 'btn btn-success'
            //         }
            //     });
            // }
        });
    })
</script>
