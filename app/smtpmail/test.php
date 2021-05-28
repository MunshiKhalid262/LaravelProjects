<div id="content"> 
     <h1>The title goes here</h1> 
    <p>The pararaph goes here</p> 
</div><div id="page"></div> 
<button id="submit">Export to  PDF</button>
<script>
    var doc = new jsPDF(); 
var specialElementHandlers = { 
    '#editor': function (element, renderer) { 
        return true; 
    } 
};
$('#submit').click(function () { 
    doc.fromHTML($('#content').html(), 15, 15, { 
        'width': 190, 
            'elementHandlers': specialElementHandlers 
    }); 
    doc.save('sample-page.pdf'); 
});
</script>