<div class="paginacion">
	<ul>
		<li class="ver">VER MAS RESULTADOS:</li>
		<li>
			<a href="<?php echo urlHelper($urlData); ?>">
				‹‹
			</a>
		</li>

		<li>
			<a href="<?php echo urlHelper($urlData, ['p' => max(0, $pageNum_registros - 1) ]); ?>">
				‹
			</a>
		</li>
		<?php for($i=0;$i<=$totalPages_registros;$i++){?>
		<li>
			<a class="<?php echo $i == $pageNum_registros ? 'active' : '' ?>" href="<?php echo urlHelper($urlData, ['p' => $i ]); ?>">
				<?php echo $i+1?>
			</a>
		</li>
		<?php } ?>
		<li>
			<a href="<?php echo urlHelper($urlData, ['p' => min($totalPages_registros, $pageNum_registros + 1) ]); ?>">
				›
			</a>
		</li>
		<li>
			<a href="<?php echo urlHelper($urlData, ['p' => $totalPages_registros ]); ?>">
				››
			</a>
		</li>
	</ul>
</div>

