<?php if (isset($_SESSION['erro'])) { ?>
    <p class="erro"><?php echo htmlspecialchars($_SESSION['erro']); ?></p>
    <?php unset($_SESSION['erro']); ?>
<?php } ?>
