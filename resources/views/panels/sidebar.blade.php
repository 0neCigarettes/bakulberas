<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item me-auto">
				<a class="navbar-brand" href="{{ url('/')}}">
					<span class="brand-logo">Bakul</span>
					<h2 class="brand-text">Beras</h2>
				</a>
			</li>
			<li class="nav-item nav-toggle">
				<a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
					<i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
					<i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="shadow-bottom"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class=" navigation-header">
				<span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
				<i data-feather="more-horizontal"></i>
			</li>
					@foreach ($menu as $item)
						@if ($item['childs'])
							<li class=" nav-item">
								<a class="d-flex align-items-center" href="#">
									<i data-feather="{{$item['icon']}}"></i>
									<span class="menu-title text-truncate" data-i18n="{{$item['label']}}">{{$item['label']}}</span>
								</a>
								<ul class="menu-content">
									@foreach ($item['childs'] as $child)
										@if(url($child['url']) == $uri_string)
											<li class="active">
										@else
								<li>
										@endif
									<a class="d-flex align-items-center" href="{{ url($child['url']) }}">
										<i data-feather="circle"></i>
										<span class="menu-item text-truncate" data-i18n="{{$child['label']}}">{{$child['label']}}</span>
									</a>
								</li>
								@endforeach
							</ul>
						</li>
						@else
							@if($uri_string === url($item['url']))
						<li class="nav-item active">
							@else
						<li class="nav-item">
							@endif
							<a class="d-flex align-items-center" href="{{ url($item['url']) }}">
								<i data-feather="{{$item['icon']}}"></i>
								<span class="menu-title text-truncate" data-i18n="{{$item['label']}}">{{$item['label']}}</span>
							</a>
						</li>
						@endif
					@endforeach
		</ul>
	</div>
</div>
