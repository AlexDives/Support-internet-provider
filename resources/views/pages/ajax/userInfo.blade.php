              <div>                              
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="navs-top-home">
                    <div>
                      <div class='row p1'>
                        <div class='col-md-3'>
                          <p>
                            <b>Группа:</b>
                          </p>
                          <p>
                            <b>Логин:</b>
                          </p>
                          <p>
                            <b>Лицевой счет:</b>
                          </p>
                          <p>
                            <b>Ф.И.О.:</b>
                          </p>
                          <p>
                            <b>Дом. телефон:</b>
                          </p>
                          <p>
                            <b>Моб. телефон:</b>
                          </p>
                          <p>
                            <b>Моб. телефон:</b>
                          </p>
                          <p>
                            <b>Адрес:</b>
                          </p>
                          <p>
                            <b>Тариф:</b>
                          </p>
                          <p>
                            <b>Трафик:</b>
                          </p> 
                        </div>
                        <div class='col-md-9'>
                          <input class="client-input client-input-flex" type="text" name="subnet" id="subnet" value="{{ $client->subnet }}" readonly>
                          <input class="client-input client-input-flex" type="text" name="login_internet" id="login_internet" value="{{ $client->login_internet }}" readonly>
                          <input class="client-input client-input-flex" type="text" name="lic_schet" id="lic_schet" value="{{ $client->lic_schet }}" readonly>
                          <input class="client-input" onblur="editClientInfo();" type="text" name="famil" id="famil" value="{{ $client->famil }}">
                          <input class="client-input" onblur="editClientInfo();" type="text" name="name" id="name" value="{{ $client->name }}">
                          <input class="client-input" onblur="editClientInfo();" type="text" name="otch" id="otch" value="{{ $client->otch }}">
                          <input class="client-input client-input-flex" onblur="editClientInfo();" type="text" name="phoneOne" id="phoneOne" value="{{ $client->phoneOne }}">
                          <input class="client-input client-input-flex" onblur="editClientInfo();" type="text" name="phoneTwo" id="phoneTwo" value="{{ $client->phoneTwo }}">
                          <input class="client-input client-input-flex" onblur="editClientInfo();" type="text" name="phoneThree" id="phoneThree" value="{{ $client->phoneThree }}">
                          <input class="client-input" onblur="editClientInfo();" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" type="text" name="address_city" id="address_city" value="{{ $client->city }}" style="width: <?php echo (strlen($client->city) + 1)*4; ?>px;"> 
                          <input class="client-input" onblur="editClientInfo();" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" type="text" name="address_street" id="address_street" value="{{ $client->street }}" style="width: <?php echo (strlen($client->street) + 1)*4; ?>px;"> 
                          <input class="client-input" onblur="editClientInfo();" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" type="text" name="address_house" id="address_house" value="{{ $client->house }}" style="width: <?php echo (strlen($client->house) + 1)*8; ?>px;">/
                          <input class="client-input" onblur="editClientInfo();" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" type="text" name="address_porch" id="address_porch" value="{{ $client->porch }}" style="width: <?php echo (strlen($client->porch) + 1)*8; ?>px;">  
                          <input class="client-input" onblur="editClientInfo();" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" type="text" name="address_floor" id="address_floor" value="{{ $client->floor }}" style="width: <?php echo (strlen($client->floor) + 1)*8; ?>px;">/
                          <input class="client-input" onblur="editClientInfo();" onkeydown="this.style.width = ((this.value.length + 1) * 8) + 'px';" type="text" name="address_flatroom" id="address_flatroom" value="{{ $client->flatroom }}" style="width: <?php echo (strlen($client->flatroom) + 1)*8; ?>px;">    
                          <input class="client-input client-input-flex" type="text" name="tariff_name" id="tariff_name" value="{{ $client->tariff_name }}" readonly>
                          <input class="client-input client-input-flex" type="text" name="trafic" id="trafic" value="{{ $trafic }}" readonly>
                          <input type="hidden" name="cid" id="cid" value="{{ $client->id }}" readonly>
                        </div>
                      </div>
                      <hr>
                      <div class='row p1'>
                        <div class='col-md-3'>
                          <p>
                            <b>Интернет:</b>
                          </p>                                        
                        </div>
                        <div class='col-md-9'>
                          <button class='btn btn-outline-primary btn-sm' onclick="editInternet('{{$client->enable_internet}}');" id="enable_internet">@if( $client->enable_internet == 'T' ) Выключить @else Включить @endif</button>
                        </div>
                      </div>
                      <hr>
                      <div class='row p1'>
                        <div class='col-md-5'>
                          <p>
                            <b>Изменить пароль на статистику:</b>
                          </p>                                        
                        </div>
                        <div class='col-md-7'>
                          <div class='row'>
                            <div class='col-md-9'>
                              <input type='password' class="form-control" name='stat_pass' id='stat_pass' value=''>
                            </div>
                            <div class='col-md-3'>
                              <button class='btn btn-outline-primary btn-sm' onclick="editPass('stats');">Изменить</button>
                            </div>
                        </div>
                      </div>
                      </div>
                      <hr>
                      <div class='row p1 zt'>
                        <div class='col-md-5'>
                          <p>
                            <b>Изменить пароль на интернет:</b>
                          </p>                                        
                        </div>
                        <div class='col-md-7'>
                          <div class='row'>
                            <div class='col-md-9'>
                              <input type='password' class="form-control" name='inte_pass' id='inet_pass' value=''>
                            </div>
                            <div class='col-md-3'>
                              <button class='btn btn-outline-primary btn-sm' onclick="editPass('internet');">Изменить</button>
                            </div>
                        </div>
                      </div>
                    </div>  
                    <hr>
                      <div class='row p1 zt'>
                        <div class='col-md-5'>
                          <p>
                            <b>Изменить IP и MAC адресса:</b>
                          </p>                                        
                        </div>
                        <div class='col-md-7'>
                          <div class='row'>
                            <div class='col-md-9'>
                              <div class="form-row">
                                <div class="form-group col mb-0">                            
                                  <input type='text' class="form-control" name='ip_address' id="ip_address" value='{{$client->ip_address}}'>
                                </div>
                                <div class="form-group col mb-0">                            
                                  <input type='text' class="form-control" name='mac_address' id="mac_address" value='{{$client->mac_address}}'>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-3'>
                              <button class='btn btn-outline-primary btn-sm' onclick="editIpMac();">Изменить</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="navs-top-stats">
                    <div class="card-body p1">
                      <div class='text-center'>
                        <h5>Статистика по платежам и другим пополнениям</h5>
                        </div>
                      <div class='row'>
                        <div class='col-md-3'></div>
                        <div class='col-md-2'>
                          <select class="custom-select mr-sm-2 mb-2 mb-sm-0" id="month">
                            <option value="01">Январь</option>
                            <option value="02">Февраль</option>
                            <option value="03">Март</option>
                            <option value="04">Апрель</option>
                            <option value="05">Май</option>
                            <option value="06">Июнь</option>
                            <option value="07">Июль</option>
                            <option value="08">Август</option>
                            <option value="09">Сентябрь</option>
                            <option value="10">Октябрь</option>
                            <option value="11">Ноябрь</option>
                            <option value="12">Декабрь</option>
                          </select>
                        </div>
                        <div class='col-md-2'>
                          <select class="custom-select mr-sm-2 mb-2 mb-sm-0 h1" id="year">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                          </select>
                        </div>
                        <div class='col-md-3'>
                          <button class='btn btn-outline-primary btn-sm' onclick="payStatistic();">Отобразить</button>
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-md-12' id="pstats">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="navs-top-messages">
                    <div class="p1" id="showMessage"> 
                    </div>
                      <div class='row text-message'>
                        <div class='col-md-2'>
                          <div class="form-group p1 mb-0">
                            <div class='comment-m'>
                              Комментарий:
                            </div>
                          </div>
                        </div>
                        <div class='col-md-8 p1'>
                          <input type="text" class="form-control" placeholder="Комментарий" id="comment">
                        </div>
                        <div class='col-md-2'>
                            <div class="form-group mb-">
                              <button type="button" class="btn btn-sm btn-outline-primary" onclick="sendMessages();">Отправить</button>
                            </div>
                        </div>
                      </div>
                  </div> 
                  <div class="tab-pane fade p1" id="navs-top-session">
                      <div class="form-group row">
                        <label class="col-form-label col-sm-3 text-sm-right" style='padding: 3px 0px 0px 0px;'>Показать в промежутке с</label>
                        <div class="col-sm-3">
                          <input type="date" class="form-control" id="startDate">
                        </div>
                        <label class="col-form-label col-sm-1 text-sm-center" style='padding: 3px 0px 0px 0px;'>по</label>
                        <div class="col-sm-3">                                        
                          <input type="date" class="form-control" id="endDate">
                        </div>
                        <div class="col-sm-2">
                          <button type='button' class='btn btn-sm btn-outline-primary' onclick="showSession();">Обновить</button>
                        </div>
                      </div>    
                      <div class='row'>
                        <div class='col-md-12' id="showSessions">    
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="navs-top-service" >
                    <div class="row" >
                      <div class='col-md-12' id="showServices">    
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="navs-top-history">
                      <div class='row'>
                        <div class='col-md-12' id='showHistory'>
                        </div>
                      </div>
                  </div>
            </div>
          </div>
        
