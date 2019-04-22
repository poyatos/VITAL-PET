<?php
    echo utf8_encode ('<nav aria-label="Page navigation example"><ul class="pagination">');
    if ($total_paginas > 1) {
        echo utf8_encode ("<li class='page-item'><a href='".$_SERVER['PHP_SELF']."?pagina=0'><i class='glyphicon glyphicon-triangle-left'></i></a></li>");
      if ($pagina != 1){
           echo utf8_encode ("<li class='page-item'><a href='".$_SERVER['PHP_SELF']."?pagina=".($pagina-1)."'><i class='glyphicon glyphicon-menu-left'></i></a></li>");
      }
      for ($i=1;$i<=$total_paginas;$i++) {
          if ($pagina == $i){
               echo utf8_encode ("<li class='page-item'><a id='actual'>$pagina</a></li>");
          } else {
               echo utf8_encode ("<li class='page-item'><a href='".$_SERVER['PHP_SELF']."?pagina=".$i."'>".$i."</a></li>");
          }
      }
      if ($pagina != $total_paginas){
           echo utf8_encode ("<li class='page-item'><a href='".$_SERVER['PHP_SELF']."?pagina=".($pagina+1)."'><i class='glyphicon glyphicon-menu-right'></i></a></li>");
      }
       echo utf8_encode ("<li class='page-item'><a href='".$_SERVER['PHP_SELF']."?pagina=".$total_paginas."'><i class='glyphicon glyphicon-triangle-right'></i></a></li>");
    }
     echo utf8_encode ('</ul></nav>'); 
?>