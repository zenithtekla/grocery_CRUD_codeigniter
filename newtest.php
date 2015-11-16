<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").wrap("<span>");
    });
});
</script>
<style>
.line-alt1{
  background-color: #E2E4FF;
    display:block;
}
.line-alt2{
    display:block;
}
</style>
</head>
<body>

<span class="line-alt1"> text 1 </span>
<span class="line-alt2">	text 2 </span>

<button>Wrap a div element around each p element</button>

</body>
</html>