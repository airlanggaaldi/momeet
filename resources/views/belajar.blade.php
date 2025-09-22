<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX & JSON</title>
</head>

<body>
    <button id="btn-load" type="button">Load Data</button>
    <ul id="result" style="margin-top: 10px;"></ul>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        setInterval(function() {
            $.ajax({
                url: "{{ url('/') }}/get_data",
                success: function(result) {
                    var output = '';
                    for (var i in result) {
                        output += '<li>' + result[i].name + '</li>';
                    }
                    $('#result').append(output);
                }
            });
        }, 10000);
    </script>
</body>

</html>
