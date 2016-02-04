</div> <!-- end of main -->

    <div class="cleaner"></div>
</div> <!-- end of wrapper -->


<div id="copyright" style="background-color: #746522;">

		<div class="left">
            Copyright © 2048 <a href="#">Islam Mušić</a><br />
            
		</div>
        <div class="right">
        	<?php
                include_once 'seja.php';
                if (isset($_SESSION['username'])) {
                    echo   'Prijavljeni ste kot: '.
                        $_SESSION['ime'].' '.
                        $_SESSION['priimek'].
                        ' ('.$_SESSION['username'].')';
                }
                ?>
        </div>
    </div> <!-- end of templatemo_footer -->


</body>
</html>