
    
      
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
                            <b>Адрес:</b>
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
                            <b>Тариф:</b>
                          </p>
                          <p>
                            <b>Трафик:</b>
                          </p> 
                        </div>
                        <div class='col-md-9'>
                          <input type="text" name="subnet" id="subnet" value="{{ $client->subnet }}">
                          <input type="text" name="login_internet" id="login_internet" value="{{ $client->login_internet }}">
                          <input type="text" name="lic_schet" id="lic_schet" value="{{ $client->lic_schet }}">
                          <input type="text" name="famil" id="famil" value="{{ $client->famil }}">
                          <input type="text" name="name" id="name" value="{{ $client->name }}">
                          <input type="text" name="otch" id="otch" value="{{ $client->otch }}">
                          <input type="text" name="address" id="address" value="{{ $client->address }}">
                          <input type="text" name="phoneOne" id="phoneOne" value="{{ $client->phoneOne }}">
                          <input type="text" name="phoneTwo" id="phoneTwo" value="{{ $client->phoneTwo }}">
                          <input type="text" name="phoneThree" id="phoneThree" value="{{ $client->phoneThree }}">
                          <input type="text" name="tariff_name" id="tariff_name" value="{{ $client->tariff_name }}">
                          <input type="text" name="trafic" id="trafic" value="{{ $trafic }}">

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
                          <button class='btn btn-outline-primary btn-sm' onlick="editClientInfo();">@if( $client->enable_internet == 'T' ) Выключить @else Включить @endif</button>
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
                              <input type='text' class="form-control" name='' value=''>
                            </div>
                            <div class='col-md-3'>
                              <button class='btn btn-outline-primary btn-sm'>Изменить</button>
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
                              <input type='text' class="form-control" name='' value=''>
                            </div>
                            <div class='col-md-3'>
                              <button class='btn btn-outline-primary btn-sm'>Изменить</button>
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
                                  <input type='text' class="form-control" name='' value='255.255.255.255'>
                                </div>
                                <div class="form-group col mb-0">                            
                                  <input type='text' class="form-control" name='' value='0f:32:44:ad:r3:85'>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-3'>
                              <button class='btn btn-outline-primary btn-sm'>Изменить</button>
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
                          <select class="custom-select mr-sm-2 mb-2 mb-sm-0">
                            <option selected="">Ноябрь</option>
                            <option value="1">Январь</option>
                            <option value="2">Февраль</option>
                            <option value="3">Март</option>
                            <option value="4">Апрель</option>
                            <option value="5">Май</option>
                            <option value="6">Июнь</option>
                            <option value="7">Июль</option>
                            <option value="8">Август</option>
                            <option value="9">Сентябрь</option>
                            <option value="10">Октябрь</option>
                            <option value="11">Ноябрь</option>
                            <option value="12">Декабрь</option>
                          </select>
                        </div>
                        <div class='col-md-2'>
                          <select class="custom-select mr-sm-2 mb-2 mb-sm-0 h1">
                            <option selected="">2019</option>
                          </select>
                        </div>
                        <div class='col-md-3'>
                          <button class='btn btn-outline-primary btn-sm'>Отобразить</button>
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-md-12'>
                          <table class="table card-table stat-table">
                            <thead class="thead-light">
                              <tr>
                                <th>Дата пополнения</th>
                                <th>Сумма</th>
                                <th>Комментарий</th> 
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>01.12.2019 10:15:29</td>
                                <td>100.00 руб.</td>
                                <td>Терминал Pay чек: №1234567564567</td> 
                              </tr>
                              <tr>
                                <td>02.12.2019 16:55:33</td>
                                <td>150.00 руб.</td>
                                <td>Терминал Pay чек: №5465465564567</td> 
                              </tr>
                              <tr>
                                <td>04.12.2019 16:19:29</td>
                                <td>100.00 руб.</td>
                                <td>Терминал Pay чек: №7687987456345</td> 
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="navs-top-messages">
                    <div class="p1">
                      <div class='row message-w'>
                        <div class='col-md-12'>
                          <div class='message-c'>
                            <div class='message-d'>
                              <b>01.12.2019 -</b>
                            </div>
                            <div class='message-t'>
                              Заключен договор на подключение
                            </div>
                          </div>
                          <div class='message-c'>
                            <div class='message-d'>
                              <b>03.12.2019 -</b>
                            </div>
                            <div class='message-t'>
                              Монтажники сделали подключение
                            </div>
                          </div>
                          <div class='message-c'>
                            <div class='message-d'>
                              <b>05.12.2019 -</b>
                            </div>
                            <div class='message-t'>
                              Расторг договор
                            </div>
                          </div>
                        </div>
                      </div>
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
                          <input type="text" class="form-control" placeholder="Комментарий">
                        </div>
                        <div class='col-md-2'>
                            <div class="form-group mb-">
                              <button type="button" class="btn btn-sm btn-outline-primary">Отправить</button>
                            </div>
                        </div>
                      </div>
                  </div> 
                  <div class="tab-pane fade p1" id="navs-top-session">
                      <div class="form-group row">
                        <label class="col-form-label col-sm-3 text-sm-right" style='padding: 3px 0px 0px 0px;'>Показать в промежутке с</label>
                        <div class="col-sm-3">
                          <input type="date" class="form-control">
                        </div>
                        <label class="col-form-label col-sm-1 text-sm-center" style='padding: 3px 0px 0px 0px;'>по</label>
                        <div class="col-sm-3">                                        
                          <input type="date" class="form-control">
                        </div>
                        <div class="col-sm-2">
                          <button type='button' class='btn btn-sm btn-outline-primary'>Обновить</button>
                        </div>
                      </div>    
                      <div class='row'>
                        <div class='col-md-12'>    
                          <table class="table card-table stat-table">
                            <thead class="thead-light">
                              <tr class='text-center'>
                                <th>Время подключения</th>
                                <th>Последнее обновление</th>
                                <th>Логин</th> 
                                <th>IP</th> 
                                <th>MAC</th> 
                                <th>Подключение</th> 
                                <th>Статус / сброс</th> 
                              </tr>
                            </thead>
                            <tbody>
                              <tr class='text-center'>
                                <td>05.12.2019 10:10:29</td>
                                <td>05.12.2019 11:15:29</td>
                                <td>17705</td>
                                <td>255.255.255.255</td>
                                <td>00:00:00:00:00:00</td>
                                <td>PPPoE</td>
                                <td>Закрыта</td> 
                              </tr> 
                              <tr class='text-center'>
                                <td>05.12.2019 10:10:29</td>
                                <td>05.12.2019 11:15:29</td>
                                <td>17705</td>
                                <td>255.255.255.255</td>
                                <td>00:00:00:00:00:00</td>
                                <td>PPPoE</td>
                                <td><button class='btn btn-outline-danger btn-sm'>сброс</button></td> 
                              </tr>  
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="navs-top-service">
                    
                  </div>
                  <div class="tab-pane fade" id="navs-top-history">
                      <div class='row'>
                        <div class='col-md-12'>
                          <table class="table card-table stat-table">
                            <thead class="thead-light">
                              <tr class='text-center'>
                                <th>Дата</th>
                                <th>Услуга</th>
                                <th>Стоимость</th> 
                                <th>Статус</th> 
                              </tr>
                            </thead>
                            <tbody>
                              <tr class='text-center'>
                                <td>05.12.2019 10:15:29</td>
                                <td>Тариф "форсаж (100)"</td>
                                <td>375 руб.</td>
                                <td>Активирован</td> 
                              </tr> 
                              <tr class='text-center'>
                                <td>03.12.2019 10:15:29</td>
                                <td>Реальный IP</td>
                                <td>0 руб.</td>
                                <td>Деактивирован</td> 
                              </tr> 
                              <tr class='text-center'>
                                <td>04.12.2019 10:15:29</td>
                                <td>Реальный IP</td>
                                <td>90 руб.</td>
                                <td>Активирован</td> 
                              </tr> 
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
            </div>
          </div>
        
