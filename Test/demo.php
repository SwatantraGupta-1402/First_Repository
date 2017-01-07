<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-body">
  <br>
 <br>
 
    <div class="container">
    
        <div class="row">
        
            <div class="col-md-12">
                <div class="panel panel-success">
                
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Click Button
                        </h3>
                       
                    </div>
                    
                    <div class="panel-body">
                   
                    
                    </div>
                    
                </div> 
            </div>
            
        </div>
</div>

</form>
<script type="text/javascript">
	$(document).on('click', '.panel-heading .btn-clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
	}
});
</script>
</body>
</html>
/************************************/
<pre>
<?php

$n = $i = 5;

while ($i--)
   echo str_repeat(' ', $i).str_repeat('* ', $n - $i)."\n";

?>	
</pre>

/*************************************/

/***********************************/
<center>
<?php

    for($i=1;$i<=5;$i++){
        for($j=1;$j<=$i;$j++){
                    echo "*";
        }
        echo "<br />";
    }

?>
</center>
/************************************/
<pre>
<?php
$n=5;
for($i=1; $i<=$n; $i++)
{
for($j=1; $j<=$i; $j++)
{
echo ' * ';
}
echo "\n";
}
for($i=$n; $i>=1; $i--)
{
for($j=1; $j<=$i; $j++)
{
echo ' * ';
}
echo "\n";
}
?>
</pre>
<!DOCTYPE html>  
     <html>   
     <head>   
  <title></title>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  </head>  
  <body>   
  <h3>Chess Board using Nested For Loop</h3>  
   <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">  
   <!-- cell 270px wide (8 columns x 60px) -->  
      <?php  
      for($row=1;$row<=8;$row++)  
      {  
          echo "<tr>";  
          for($col=1;$col<=8;$col++)  
          {  
          $total=$row+$col;  
          if($total%2==0)  
          {  
          echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";  
          }  
          else  
          {  
          echo "<td height=30px width=30px bgcolor=#000000></td>";  
          }  
          }  
          echo "</tr>";  
    }  
          ?>  
  </table>  
  </body>  
  </html>  