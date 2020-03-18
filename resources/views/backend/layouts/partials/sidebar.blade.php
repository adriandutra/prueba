@inject('bladeHelper', 'App\Helpers\BladeHelper')

                        <div class="sidebar">
							<div class="btn-box-row row-fluid"><form id="save_post" method="post" action="{{url('/importcsv')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <ul class="widget widget-usage unstyled span12">
                                        <li ><p>
						                    <label><a onclick="performClick('file');">
                                            <input type="file" id="file" style="display:none;" name="file"  accept=".csv"/>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                <strong>A&ntilde;ade tus archivos</strong> 
                                                
                                            </a></label></p>
                                        </li>
                                        <li>
											<p><label id="namefile"></label>
                                            </p><br><br><br><br>
                                        </li>

                                        <li>
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Enviar archivo" class="btn btn-large btn-info">
                                        </li>
                                    </ul>
                                    </form>
                                </div>
                        </div>