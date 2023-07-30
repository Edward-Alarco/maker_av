<?php require_once('inc/header.php'); ?>
    
<div class="w-100 vh-100 canvas">
    <div class="canvas_container">

    </div>
</div>

<div class="sidebar">
    <div class="sidebar_button toOpen">
        <svg width="212" height="328" viewBox="0 0 212 328" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M39.62 321.822L202.74 182.042C205.368 179.789 207.477 176.994 208.923 173.849C210.37 170.704 211.118 167.284 211.118 163.822C211.118 160.36 210.37 156.94 208.923 153.795C207.477 150.65 205.368 147.855 202.74 145.602L39.62 5.822C24.05 -7.518 0 3.542 0 24.042V303.642C0 324.142 24.05 335.202 39.62 321.822Z" fill="black"/>
        </svg>
    </div>
    <div class="sidebar_content">
        <div class="drag_drop">
            <p>Subir imagen de fondo</p>
            <input type="file" name="background" accept=".png, .jpg, .jpeg" />
        </div>
    </div>
</div>

<script defer src="../js/functions/canvas.js"></script>

</body>
</html>