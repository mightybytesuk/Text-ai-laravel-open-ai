<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TextAI</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="text-center mt-4">
            TextAI
        </h1>
        <p class="text-center">
           This uses OpenAi GPT3 to create text based of the inputs. You could use this to create blog posts & much more.
        </p>
        <div class="row">
            <div class="col">
                <form name="myform" action="" method="GET">
                    Enter something in the box: <BR>
                    <textarea name="prompt" class="form-control" cols="30" rows="10"></textarea>
                    <center>
                    <input type="button" name="button" class="btn btn-success mt-2" Value="Click" onClick="testResults(this.form)">
                </center>
                </form>
            </div>
            <div class="col">
                results: <br>
                <textarea id="response" class="form-control" placeholder="Results will show here" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
    <SCRIPT LANGUAGE="JavaScript">
       function testResults (form) {
        
        fetch('/request/' + form.prompt.value)
    .then(response => response.text())
    .then(data => { 
        console.log(data);
        const parsedData = JSON.parse(data);
        var finalData = parsedData.choices[0].text;
        document.getElementById("response").innerHTML =  finalData.trim();
    });
       }

        </SCRIPT>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
