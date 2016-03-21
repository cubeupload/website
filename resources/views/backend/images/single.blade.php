							<div class="col-md-3">
								<div class="thumbnail">
									<a href="{{ url( '/admin/images/show/' . $image->id ) }}">
										<img src="{{ $image->getPublicUrl() }}">
									</a>
									<div class="caption">
										<p>
											<a href="{{ url( '/admin/images/show/' . $image->id ) }}">
												<strong>{{ $image->name }}</strong>
											</a>
										</p>
										<p><small>Uploaded {{ $image->created_at->diffForHumans() }}</small></p>
										<small> By
										@if( $image->user )
										<a href="{{ url('/admin/users/show/' . $image->user->id) }}">{{ $image->user->username }}</a>
										@else
										<a href="#">{{ $image->uploader_ip }}</a>
										@endif
										</small>
									</div>
								</div>
							</div>