<div class="pageFooter" >
	<p class="bodyfooter" > Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Powered by @lemil Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

</body>
</html>
<!-- Footer CRUD -->