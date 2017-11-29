<div class="g-warper">
    <div class="g-menu-flag">
                			
    </div>
    <div class="g-logo-menu">
    	<img src="<?php echo $ctlLogoUrl; ?>" />
    </div>
    <div class="g-menu">
    	<ul class="nav nav-pills nav-stacked">
    		<?php foreach($ctlArrMenu as $key => $arrVal) { ?>
        		<li>
        			<a class="<?php echo ($key == $ctlActive) ? "active" : ""; ?>
        				<?php echo $arrVal["class"] ?>"
        				href="<?php echo $arrVal["href"] ?>">
        				<?php echo $arrVal["text"] ?>
    				</a>
        		</li>
    		<?php } ?>
    	</ul>
    </div>
</div>