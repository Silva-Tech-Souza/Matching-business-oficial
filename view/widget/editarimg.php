<div id="add_perfilimg" class="modal  fade mt-1 hide" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title txtnomeperfil">Edit Image</h5>
				<button type="button" class="close rounded-2 border-0 bcolor-azul-escuro" data-dismiss="modal" aria-label="Close">
					<span class="color-branco" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="imagemforms" method="POST" enctype="multipart/form-data">
					<!-- Content -->
					<div class="row" style="padding: 17px;">
						<div class="col-sm-12 col-md-12 col-lg-12" style=" padding: 0;">
							<!-- <h3>Demo:</h3> -->
							<div class="img-container mx-auto" style="max-width: -webkit-fill-available;height: 300px;">
								<img src="<?php if ($imgperfil != "Avatar.png" && $imgperfil != "") {
                                echo "" . $imgperfil;
                              } else {
                                echo "assets/img/Avatar.png";
                              } ?>" clase="imgcroptamanho" id="imagey" alt="Picture" />
							</div>
						</div>
					</div>
					<div class="row" id="actions" style="justify-content: center;">
						<div class="docs-buttons" style="width: max-content;">
							<div class="btn-group">
								<label class="btn btn-success btn-upload" for="inputImage" title="Upload image file" style="font-size: large;">
									<input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png" />
									<span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
										<span class="fa fa-upload"></span>
									</span>
								</label>

							</div>
							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" id="rotate-left" title="Rotate Left" style="font-size: large;">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
										<span class="fa fa-rotate-left"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="rotate" data-option="45" id="rotate-right" title="Rotate Right" style="font-size: large;">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
										<span class="fa fa-rotate-right"></span>
									</span>
								</button>
							</div>
							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" id="scale-x" title="Flip Horizontal" style="font-size: large;">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
										<span class="fa fa-arrows-h"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" id="scale-y" title="Flip Vertical" style="font-size: large;">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
										<span class="fa fa-arrows-v"></span>
									</span>
								</button>
							</div>


							<!-- Show the cropped image in modal -->
							<div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="getCroppedCanvasTitle">
												Cropped
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: large;">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body"></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Close
											</button>
											<a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /.modal -->

						</div>
						<!-- /.docs-buttons -->
						<div class=" docs-toggles" style="width: max-content;">
							<!-- <h3>Toggles:</h3> -->
							<div class="btn-group d-flex flex-wrap" data-toggle="buttons">




							</div>
							<!-- /.dropdown -->
						</div>
						<!-- /.docs-toggles -->
					</div>
					<div class="col-sm-12 mt-4" style="text-align: end;">
						<div class="submit-section mt-4">
							<button name="editarPerfils" onclick="salvarEdicaoPerfil()" value="Salvar" class="btn btn-primary submit-btn sizetituloedit">Confirm</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>