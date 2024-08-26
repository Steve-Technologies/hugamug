<?php 
 function createFooter($scripts){
    ?>
     </div>
    <script src="./components/scripts/dash_script.js"></script>
    <?php 
    foreach ($scripts as &$script) {
        ?>
        <script src="./components/scripts/<?php echo $script?>"></script>
        <?php
    }
    unset($script)
    ?>
</body>
</html>
    <?php
 }
?>