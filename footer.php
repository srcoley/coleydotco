		</div>
		<footer>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
				<li><a href="http://twitter.com/coleydotco">@coleydotco</a></li>
				<li><a href="http://github.com/srcoley">Github</a></li>
				<li class="last"><a href="http://dknewmedia.com">DK New Media</a></li>
			</ul>
			<p>Copyright &copy; Stephen Coley <?php echo date('Y'); ?></p>
		</footer>
		</div>
		<div id="overlay"></div>
		<div id="viewer"><button id="viewer_close" value="Close" >Close</button><div id="viewer_content"></div></div>
		<div id="zoom"></div>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<?php wp_footer(); ?>
	</body>
</html>
