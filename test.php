<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Export</title>
    <link href="assets/__css/typeahead.css" rel="stylesheet">
    <script src="assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript">
        $(function(){
            $('select option').each(function() {
                if ($( this ).index() % 2 == 1)
                    $( this ).css({"background-color":"#F0F0F0"});
            });
            
            $('select').on('change', function() {
                // console.log( $( "select option:selected" ).index() ); // or $( "#select-theme option:selected" )
                var $t_css_link = "assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/styles/";
                var $t_href = $t_css_link + this.value + ".css";
                $("head").append($("<link rel='stylesheet' href="+ $t_href + " type='text/css' media='screen' />"));
            }).change();
            
            var toggleStrip = function(boo){
                var arr = $("pre").html().split('\n'); // $('pre').html().match(/\n/) or $('pre').html().split(/\n/).length http://stackoverflow.com/a/5545531
                for (var i = 0; i < arr.length; i++){
                    if (i % 2 == 1){
                        var replace = '<span class="line-alt1">' + arr[i] + '</span>';
                        if (boo)
                            $("code").html(function () {
                                return $(this).html().replace(arr[i], replace);
                                // return $(this).wrapInner('<span class="line-alt1"></span>');
                            });
                        else    $('.line-alt1').contents().unwrap();
                    }
                }
            };
            
            $('input:checkbox').on('change', function(data){
                toggleStrip($(this).is(":checked"));
            });
        });
    </script>
    <style type="text/css">
        
    </style>
</head>
<body>
<div class="container">
<select id="select-theme" class="typeahead">
    <option value="monokai_sublime">monokai_sublime</option>
    <option value="default" selected="selected">default</option>
    <option value="arta">arta</option>
    <option value="ascetic">ascetic</option>
    <option value="atelier-dune.dark">atelier-dune.dark</option>
    <option value="atelier-dune.light">atelier-dune.light</option>
    <option value="atelier-forest.dark">atelier-forest.dark</option>
    <option value="atelier-forest.light">atelier-forest.light</option>
    <option value="atelier-heath.dark">atelier-heath.dark</option>
    <option value="atelier-heath.light">atelier-heath.light</option>
    <option value="atelier-lakeside.dark">atelier-lakeside.dark</option>
    <option value="atelier-lakeside.light">atelier-lakeside.light</option>
    <option value="atelier-seaside.dark">atelier-seaside.dark</option>
    <option value="atelier-seaside.light">atelier-seaside.light</option>
    <option value="brown_paper">brown_paper</option>
    <option value="dark">dark</option>
    <option value="docco">docco</option>
    <option value="far">far</option>
    <option value="foundation">foundation</option>
    <option value="github">github</option>
    <option value="googlecode">googlecode</option>
    <option value="idea">idea</option>
    <option value="ir_black">ir_black</option>
    <option value="magula">magula</option>
    <option value="mono-blue">mono-blue</option>
    <option value="monokai">monokai</option>
    <option value="obsidian">obsidian</option>
    <option value="paraiso.dark">paraiso.dark</option>
    <option value="paraiso.light">paraiso.light</option>
    <option value="pojoaque">pojoaque</option>
    <option value="railscasts">railscasts</option>
    <option value="rainbow">rainbow</option>
    <option value="school_book">school_book</option>
    <option value="solarized_dark">solarized_dark</option>
    <option value="solarized_light">solarized_light</option>
    <option value="sunburst">sunburst</option>
    <option value="tomorrow-night-blue">tomorrow-night-blue</option>
    <option value="tomorrow-night-bright">tomorrow-night-bright</option>
    <option value="tomorrow-night-eighties">tomorrow-night-eighties</option>
    <option value="tomorrow-night">tomorrow-night</option>
    <option value="tomorrow">tomorrow</option>
    <option value="vs">vs</option>
    <option value="xcode">xcode</option>
    <option value="zenburn">zenburn</option>
</select> <label>     Striped Background<input type="checkbox" name="checkbox" value="value"></label>
<br/><br/>
<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "grocery_crud";
    $dbport = 3306;

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    $qr = "SELECT thread, subject, content FROM sample_table";
	$result = $mysqli->query($qr) or die($mysqli->error);
	$num_rows = $result->num_rows;
	echo "<table id='displayCSS'><tr><th>Thread</th><th>Subject</th><th>Content</th></tr>";
	if ($num_rows){
		$t_result_arr = [];
		$t_id = 0;
		while ( ($row=$result->fetch_assoc()) !== null ) {
			$t_result_arr[] = $row;
			$t_id++;
			$t_class = (($t_id % 2)==0) ? 'alt': '';
			
			echo "<tr class=". $t_class ."><td>" . $row["thread"] . "</td>
			          <td>" . $row["subject"] . "</td>
			          <td><div id='td-content'>" . $row["content"] . "</div></td></tr>";
		}
		$result->free();
	}
	echo "</table>";
    /* close connection */
	$mysqli->close();
	
	/*$jsonString = json_encode($t_result_arr, JSON_PRETTY_PRINT);
	echo $jsonString . "<br/><br/>";*/
	
?>
</div>
</body>
</html>