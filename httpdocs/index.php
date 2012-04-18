<? include('../app/bootstrap.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<title>ISS Pass Alert</title>
		
		<meta name="description" content="A utility to show visible ISS passes in the next 24 hours from Woodland, CA." />
		<meta name="viewport" content="width=device-width" />

		<link rel="stylesheet" href="/css/master.css" />
		<script src="/js/modernizr-2.5.3.min.js"></script>
	</head>
	<body>
		
		<header>
			<h1>ISS Passes in the next 24 hours</h1>
		</header>
		
		<div roll="main">
			
			<section class="passes">
			
			<? if ($iss->results) { ?>
				
				<ul>
				
				<? foreach ($iss->results as $pass) { ?>
				    
				    <li>
				    	<hgroup>
							<h2 class="passtime">
								<time datetime="<?=date('Y-m-d',$pass->start->time)?>">
									<span class="month"><?=date('F',$pass->start->time)?></span>
									<span class="day"><?=date('j',$pass->start->time)?></span>
									<span class="year"><?=date('Y',$pass->start->time)?></span>
								</time>
							</h2>
							<h3 class="magnitude"><?=$pass->magnitude?></h3>
				    	</hgroup>
				    	
				    	<table>
				    		<colgroup span="2" class="star"></colgroup>
				    		<colgroup span="2" class="peak"></colgroup>
				    		<colgroup span="2" class="end"></colgroup>
				    		<thead>
				    			<tr>
				    				<th colspan="2">Start</th>
				    				<th colspan="2">Peak</th>
				    				<th colspan="2">End</th>
				    			</tr>
				    		</thead>
				    		
				    		<tbody>
				    			<tr>
				    				<td colspan="2"><time datetime="<?=date('g:i:s',$pass->start->time)?>"><?=date('g:i:s A',$pass->start->time)?></time></td>
				    				<td colspan="2"><time datetime="<?=date('g:i:s',$pass->max->time)?>"><?=date('g:i:s A',$pass->max->time)?></time></td>
				    				<td colspan="2"><time datetime="<?=date('g:i:s',$pass->end->time)?>"><?=date('g:i:s A',$pass->end->time)?></time></td>
				    			</tr>
				    			<tr>
				    				<th><span>Dir</span></th>
				    				<th><span>Alt</span></th>
				    				<th><span>Dir</span></th>
				    				<th><span>Alt</span></th>
				    				<th><span>Dir</span></th>
				    				<th><span>Alt</span></th>
				    			</tr>
				    			<tr>
				    				<td><?=convertAzimuth($pass->start->az)?></td>
				    				<td><?=$pass->start->alt?>&deg;</td>
				    				<td><?=convertAzimuth($pass->max->az)?></td>
				    				<td><?=$pass->max->alt?>&deg;</td>
				    				<td><?=convertAzimuth($pass->end->az)?></td>
				    				<td><?=$pass->end->alt?>&deg;</td>
				    			</tr>
				    		</tbody>
				    	</table>
				    </li>
				    
				<? } ?>
				
				</ul>
			
			<? } else { ?>
				
				<ul>
					<li>
						<p>
							<img src="img/no-pass-day.gif" width="16" height="16" alt="no-pass-day" /> 
							<img src="img/no-pass-night.gif" width="16" height="16" alt="no-pass-night" /> 
							No visible passes today.
						</p>
					</li>
				</ul>
				
			<? } ?>
			
				<p><a href="#" id="night-mode">Night Mode</a></p>
			
			</section>
			
		</div>
		
		<footer>
	
		</footer>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  		<script>window.jQuery || document.write('<script src="/js/jquery-1.7.1.min.js"><\/script>')</script>

		<script src="/js/site.js"></script>
	</body>
</html>
