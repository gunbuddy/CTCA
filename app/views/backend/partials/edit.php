<div class="row">
	<div class="large-12 columns">
		<nav class="product-breadcumb">
			<a href="<?php echo route("backend.service"); ?>" title="general">Backend</a>
			<a href="<?php echo route("backend.service"); ?>" title="escritorio">Contenido</a>
			<a href="<?php echo route("backend.service"); ?>" title="general">Telecomunicaciones</a>
			<a href="<?php echo route("backend.service"); ?>" title="general">Planes telefonicos</a>
			<a href="<?php echo route("backend.service"); ?>" title="general">Crear plan</a>
		</nav>
	</div>
</div>

<section class="product-creation">
	<div class="row">
		<div class="large-12 columns">
			<h3>Crear plan de telefonia</h3>

			<div class="row">
				<div class="large-2 columns">
					

				</div>
				<div class="large-10 columns">

					<div class="row">
						<div class="large-4 columns">
							<input type="text" ng-model="name" placeholder="Nombre del plan" />
						</div>
						<div class="large-4 columns" align="left">
							<named-selector in="type">
								<ne value="prepaid" selected>Prepago</ne>
								<ne value="postpaid">Postpago</ne>
							</named-selector>
						</div>
						<div class="large-4 columns">
							<div class="row">
								<div class="large-4 columns" align="center">
									<div class="radio-select">
										<input name="company" ng-model="company.id" value="1" type="radio" id="telcel" />
										<label for="telcel"></label>
									</div>
									Telcel
								</div>
								<div class="large-4 columns" align="center">
									<div class="radio-select">
										<input name="company" ng-model="company.id" value="2" type="radio" id="movistar" />
										<label for="movistar"></label>
									</div>
									Movistar
								</div>
								<div class="large-4 columns" align="center">
									<div class="radio-select">
										<input name="company" ng-model="company.id" value="3" type="radio" id="iusacell" />
										<label for="iusacell"></label>
									</div>
									Iusacell
								</div>
							</div>
							<div class="white-margin"></div>
							<div class="row">
								<div class="large-3 columns large-offset-3" align="center">
									<div class="radio-select">
										<input name="company" ng-model="company.id" value="4" type="radio" id="nextel" />
										<label for="nextel"></label>
									</div>
									Nextel
								</div>
								<div class="large-3 columns" align="center">
									<div class="radio-select">
										<input name="company" ng-model="company.id" value="5" type="radio" id="unefon" />
										<label for="unefon"></label>
									</div>
									Unefon
								</div>
								<div class="large-3 columns" align="center">
								</div>
							</div>
						</div>
					</div>	

					<div class="white-margin"></div>

					<div class="row" ng-hide="type!='prepaid'">
						<div class="large-4 columns" align="center">
							<h4>Minutos incluidos</h4>
							<div class="graph-input-show" ng-bind="minutes"></div>
							<input type="text" value="{{ minutes }}" data-displayInput="false" name="minutes" id="minutes" data-min="1" data-max="3000" class="dial" data-width="180" data-bgColor="#FFF" data-fgColor="#419CD7">
						</div>
			
						<div class="large-4 columns" align="center">
							<h4>Mensajes incluidos</h4>
							<div class="graph-input-show" ng-bind="messages"></div>
							<input type="text" data-displayInput="false" name="messages" id="messages" data-min="1" data-max="4000" class="dial" data-width="180" data-bgColor="#FFF" data-fgColor="#419CD7">
						</div>

						<div class="large-4 columns" align="center">
							<h4>Internet incluidos</h4>
							<div class="graph-input-show">{{ internet }}</div>
							<input type="text" data-displayInput="false" name="internet" id="internet" data-min="1" data-max="2000" class="dial" data-width="180" data-bgColor="#FFF" data-fgColor="#419CD7">
						</div>
					</div>

					<div class="white-margin"></div>

					<div class="row" ng-hide="type!='prepaid'">
						<div class="large-4 columns" align="left">
							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Minutos todo destino
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="minutes_toany" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Minutos misma compañia
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="minutes_tosame" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Minutos otras compañias
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="minutes_toother" />
								</div>
							</div>
						</div>
			
						<div class="large-4 columns">
							<h4 align="center">Red</h4>
							<div class="row">
								<div class="large-4 columns" align="center">
									<div class="check-select">
										<input name="net3g" ng-model="networks.3g" type="checkbox" id="net3g" />
										<label for="net3g"></label>
									</div>
								</div>

								<div class="large-8 columns">
									3G (HDSPA/CDMA)
								</div>	
							</div>

							<div class="row">
								<div class="large-4 columns" align="center">
									<div class="check-select">
										<input name="net4g" ng-model="networks.4g" type="checkbox" id="net4g" />
										<label for="net4g"></label>
									</div>
								</div>

								<div class="large-8 columns">
									4G (LTE/HSPA+)
								</div>	
							</div>

							<div class="row">
								<div class="large-4 columns" align="center">
									<div class="check-select">
										<input name="net2g" ng-model="networks.2g" type="checkbox" id="net2g" />
										<label for="net2g"></label>
									</div>
								</div>

								<div class="large-8 columns">
									Edge 2G(GSM/GPRS)
								</div>	
							</div>
						</div>

						<div class="large-4 columns">
							<div class="row">
								<div class="large-7 columns">
									<div class="semi-white-margin"></div>
									Velocidad internet movil
								</div>
								<div class="large-5 columns">
									<input type="text" ng-model="internet_speed" placeholder="100 kbps" />
								</div>
							</div>
							<div class="row">
								<div class="large-5 columns">
									<div class="semi-white-margin"></div>
									Numeros gratis
								</div>
								<div class="large-7 columns">
									<input type="text" ng-model="free_numbers_tosame" placeholder="misma compañia" />
									<input type="text" ng-model="free_numbers_toother" placeholder="otras compañias" />
								</div>
							</div>
						</div>
					</div>	

					<div class="white-margin"></div>

					<div class="row" ng-hide="type!='prepaid'">
						<div class="large-4 columns" align="left">
							<dropdown in="payment">
								<de value="minute">cobro por minuto</de>
								<de value="second">cobro por segundo</de>
							</dropdown>
						</div>
			
						<div class="large-4 columns">
							<dropdown in="radio">
								<de value="0">Sin radio incluido</de>
								<de value="1">Con radio incluido</de>
							</dropdown>
						</div>

						<div class="large-4 columns">
							<dropdown in="length">
								<de value="24">24 meses</de>
								<de value="18">18 meses</de>
								<de value="12">12 meses</de>
							</dropdown>
						</div>
					</div>	

					<div class="white-margin"></div>

					<div class="row" ng-hide="type!='prepaid'">
						<div class="large-4 columns" align="left">
							<h4>Costo minuto adicional</h4>
						</div>
			
						<div class="large-4 columns">
							<h4>Costo segundo adicional</h4>
						</div>

						<div class="large-4 columns">
							&nbsp;
						</div>
					</div>	


					<div class="white-margin"></div>

					<div class="row" ng-hide="type!='prepaid'">
						<div class="large-4 columns" align="left">
							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Todo destino
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.minute.unlimited" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Misma comañia
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.minute.inside" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Otras compañias
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.minute.outside" />
								</div>
							</div>
						</div>
			
						<div class="large-4 columns">
							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Todo destino
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.second.unlimited" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Misma comañia
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.second.inside" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Otras compañias
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.second.outside" />
								</div>
							</div>
						</div>

						<div class="large-4 columns">
							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									SMS adicional
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.sms" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Internet adicional (kb)
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.internet" />
								</div>
							</div>

							<div class="row">
								<div class="large-8 columns">
									<div class="semi-white-margin"></div>
									Mensaje multimedia (MMS)
								</div>
								<div class="large-4 columns">
									<input type="text" ng-model="additional.mms" />
								</div>
							</div>
						</div>
					</div>	
					<div class="row" ng-hide="type!='postpaid'">
						<div class="large-12 columns">
							<h4>Postpago</h4>
						</div>
					</div>

					<div class="white-margin"></div>
					<div class="row">
						<div class="large-5 columns large-centered">
							<div class="row">
								<div class="large-6 columns">
									<a href="#" class="button hot expand">Siguiente</a>
								</div>
								<div class="large-6 columns">
									<a href="#" class="button hot expand">Terminar</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>