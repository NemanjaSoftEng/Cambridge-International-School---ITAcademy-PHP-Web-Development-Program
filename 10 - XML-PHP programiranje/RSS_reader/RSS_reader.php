<?php

$books = array();
$elements = null;


function startTag($sax_parser, $tag) {
    global $books, $elements;
      if(!empty($tag)){
        if($tag == 'BOOK'){
            $books [] = array();
        }
        $elements = $tag;
      }

}

function endTag($sax_parser, $tag) {
    global $elements;
    if(!empty($tag)){
        $elements = null;
    }
}

function textData($sax_parser,$data){
    global $books, $elements;
    if(!empty($data)){
        if($elements == 'HEADING' || $elements == 'AUTHOR' || $elements == 'CATEGORY' || $elements == 'PUBLISHER' || $elements == 'PAGES'){
            $books[count($books)-1][$elements] = trim($data);
        }
    }
}

$sax_parser = xml_parser_create();

xml_set_element_handler($sax_parser,"startTag","endTag");
xml_set_character_data_handler($sax_parser, "textData");

if(!($handle = fopen('RSS_reader_datas.xml',"r"))){
    die("ERROR: file couldn't be opened!");
}

while($data = fread($handle,4096)){
    xml_parse($sax_parser,$data);
}

xml_parser_free($sax_parser);

echo "<i><b style='color: red; border: 3px solid red; background-color: yellow; font-size: 33px;'>Books, my brothers, books, not bells and jingle bells! - Dositej Obradovic(1739-1811)</b></i>" . "<br><br>";
echo "Choose a book: " . "<br>";
echo '<select name="choice" onchange="myFunction(this)">';

foreach($books as $book){
   echo '<option value="'."Heading: ".$book['HEADING'] ."<br>".
                        "Author: ".$book['AUTHOR'] . "<br>".
                        "Category: ".$book['CATEGORY'] . "<br>".
                        "Publisher: ".$book['PUBLISHER'] . "<br>".
                        "Pages: ".$book['PAGES'] . "<br>".    '">'       .$book['HEADING'].'</option>';
}

echo '</select>' . "<br><br>";

echo '<div id="some_div">
    
    </div>

    <script>
        document.title = "JavaScript - title override html <title>";

        function myFunction(f){
            var p1 = document.getElementById("some_div");
            p1.innerHTML = f.value;
        }

    </script>';

//var_dump($books);







?>