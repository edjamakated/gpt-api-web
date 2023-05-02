<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPT Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="chat-window" style="border: 1px solid black; width: 400px; height: 300px; overflow-y: scroll; padding: 5px; margin-bottom: 10px;"></div>
    <form id="chat-form">
        <input type="text" id="user_instructions" placeholder="User Instructions" required style="width: 100%;"><br>
        <input type="text" id="assistant_instructions" placeholder="Assistant Instructions" required style="width: 100%;"><br>
        <input type="text" id="system_instructions" placeholder="System Instructions" required style="width: 100%;"><br>
        <button type="submit">Send</button>
    </form>

    <script>
        $(document).ready(function() {
            $("#chat-form").on("submit", function(e) {
                e.preventDefault();
                const user_instructions = $("#user_instructions").val();
                const assistant_instructions = $("#assistant_instructions").val();
                const system_instructions = $("#system_instructions").val();

                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    dataType: 'json',
                    data: JSON.stringify({
                        user_instructions: user_instructions,
                        assistant_instructions: assistant_instructions,
                        system_instructions: system_instructions
                    }),
                    contentType: 'application/json',
                    success: function(data) {
                        $("#chat-window").append('<p><strong>User:</strong> ' + user_instructions + '</p>');
                        $("#chat-window").append('<p><strong>Assistant:</strong> ' + data.response + '</p>');
                        $("#chat-window").scrollTop($("#chat-window")[0].scrollHeight);
                        $("#user_instructions").val('');
                        $("#assistant_instructions").val('');
                        $("#system_instructions").val('');
                    },
                    error: function(xhr, status, error) {
                        const errorMsg = JSON.parse(xhr.responseText).error;
                        alert('Error: ' + errorMsg);
                    }
                });
            });
        });
    </script>
</body>

</html>