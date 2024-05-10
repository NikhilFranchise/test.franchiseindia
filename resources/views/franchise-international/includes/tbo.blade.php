<div class="ffcblk">
	<div class="container">
		<h2 class="subhead">Top Business Opportunities</h2>
		<div class="row">
			<ul class="ffclist">
				@foreach($brands as $brand)
					<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
						<div class="fblk">
							<a href="{{Config('constants.MainDomain')}}/brands/{{ $brand->profile_name }}.{{ $brand->fran_detail_id }}" target="_blank">
								<img src="{{ Config('constants.franAwsImgPath').$brand->company_logo }}" alt="{{ $brand->profile_name }}">
							</a>
						</div>
						<div class="ffcinc">Investment: <span>{{ Config('constants.investRangeInWords.'.$brand->unit_investment) }}</span></div>
					</li>
				@endforeach
				
				
				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/maxbrenner" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/max_199x81.png') }}" alt="max_199x81">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 5Cr. above</span></div>
				</li>
				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/icl/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/icecream-lab_199x81.png') }}" alt="icecream-lab_199x81">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 35lac – 70lac Onwards</span></div>
				</li>
				
				
				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/spiceboxorganics/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/spicebox_199x81.png') }}" alt="spicebox_199x81">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 50lac. above</span></div>
				</li>
				
				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/sbarro/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/sbarro.jpg') }}" alt="sbarro">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 10 Cr Onwards</span></div>
				</li>

				<!--<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/fatburger/" target="_blank">
							<img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/fatburgernew.jpg" alt="Fatburger">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 1 Cr Onwards</span></div>
				</li>-->


<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franchiseindia.com/brands/london-school-of-trends.64877" target="_blank">
							<img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/london-school-of-trends_1.jpg" alt="London School of Trends">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 50 Lac - 1 Cr</span></div>
				</li>




				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/wrap-it-up-new/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/wrapitup.jpg') }}" alt="Wrap It UP">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 50 Lac Onwards</span></div>
				</li>

				
					<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
						<div class="fblk">
							<a href="https://www.franglobal.com/icl/" target="_blank">
								<img src="{{ url('/franchiseinternational/images/banners/homepage/icl.jpg') }}" alt="Ice Cream Lab">
							</a>
						</div>
						<div class="ffcinc">Investment: <span>Rs. 35 Lacs- 70lacs</span></div>
					</li>
				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/kerrimo/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/kerrimo.jpg') }}" alt="Kerrimo">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 60 Lac Onwards</span></div>
				</li>
					<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
						<div class="fblk">
							<a href="https://www.franglobal.com/the-coffee-club/" target="_blank">
								<img src="{{ url('/franchiseinternational/images/banners/homepage/tcc.jpg') }}" alt="The Coffee Club">
							</a>
						</div>
						<div class="ffcinc">Investment: <span>Rs. 1.3 Cr Onwards</span></div>
					</li>

				
					<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
						<div class="fblk">
							<a href="https://www.franglobal.com/haagen-dazs/" target="_blank">
								<img src="{{ url('/franchiseinternational/images/banners/homepage/haagen.jpg') }}" alt="haagen">
							</a>
						</div>
						<div class="ffcinc">Investment: <span>Rs. 60 lacs Onwards</span></div>
					</li>
					<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
						<div class="fblk">
							<a href="https://www.franglobal.com/potato-corner/" target="_blank">
								<img src="{{ url('/franchiseinternational/images/banners/homepage/potatocorner.jpeg') }}" alt="Potato Corner">
							</a>
						</div>
						<div class="ffcinc">Investment: <span>Rs. 90 Lac Onwards</span></div>
					</li>

					<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
						<div class="fblk">
							<a href="https://www.franglobal.com/tapas-club/" target="_blank">
								<img src="{{ url('/franchiseinternational/images/banners/homepage/tapas-club.jpeg') }}" alt="Tapas Club">
							</a>
						</div>
						<div class="ffcinc">Investment: <span>Rs. 1 cr Onwards</span></div>
					</li>
				

				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/0to8-early-start/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/0to8-early-start.jpg') }}" alt="0to8 early start">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 40 Lac Onwards</span></div>
				</li>

				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/sumo-sushi/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/sumo.jpg') }}" alt="Sumo sushi">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 1.5 Cr Onwards</span></div>
				</li>

				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/wokboyz/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/wokboyz.jpg') }}" alt="wokboyz">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 60 Lac Onwards</span></div>
				</li>

				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/the-massage-company/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/tmc.jpg') }}" alt="The Massage Company">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 55 Lac Onwards</span></div>
				</li>

				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/engage-and-grow/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/Logo-20.jpg') }}" alt="Engage and grow">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 3.5 lacs Onwards</span></div>
				</li>
				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="http://actioncoachindia.in/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/actioncoach.jpg') }}" alt="actioncoach">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 15 lac-45 lacs</span></div>
				</li>

				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="https://www.franglobal.com/spanishdoughnuts/" target="_blank">
							<img src="{{ url('/franchiseinternational/images/banners/homepage/spanishdoughnuts.jpg') }}" alt="Spanish Doughnuts">
						</a>
					</div>
					<div class="ffcinc">Investment: <span>Rs. 15 lac-45 lacs</span></div>
				</li>





				<li class="col-xs-12 col-sm-3 col-md-2 mdfy">
					<div class="fblk">
						<a href="#" target="_blank">
							<img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/mrjeff.jpg" alt="">
						</a>
					</div>
					<div class="ffcinc"><!-- Investment: <span>Rs. 15 lac-45 lacs</span> --></div>
				</li>





			</ul>
		</div>
	</div>
</div>