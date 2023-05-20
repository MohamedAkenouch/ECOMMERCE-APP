
<div class="container" style="margin-top:10%;margin-bottom:10%;">
                  <div class="row">
                      <div class="col-md-8">
                          <div class="well well-sm">
                            <form id="contact" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="name">
                                              Nom</label>
                                          <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom" required="required" />
                                          <?php echo $contact_nameErr ?>
                                      </div>
                                      <div class="form-group">
                                          <label for="email">
                                              Adresse email</label>
                                          <div class="input-group">
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                              </span>
                                              <input type="email" class="form-control" name="email" id="email" placeholder="Entrer l'email" required="required" /></div>
                                              <?php echo $contact_emailErr ?>
                                      </div>
                                      <div class="form-group">
                                          <label for="subject">
                                              Sujet</label>
                                          <select id="subject" name="subject" class="form-control" required="required">
                                          <?php echo $contact_subjectErr ?>
                                              <option value="na" selected="">Choisir:</option>
                                              <option value="service">Services</option>
                                              <option value="suggestions">Suggestions</option>
                                              <option value="product">Aide</option>
                                          </select>
                                          <div style="color:red;" ><?php echo $contact_subjectErr ?></div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                         
                                          <label for="name">
                                              Message</label>
                                          <textarea name="message" form="contact" id="message" class="form-control" rows="9" cols="25" required="required"
                                              placeholder="Message"></textarea>
                                              <?php echo $contact_messageErr ?>
                                      </div>
                                  </div>
                                  <div style="margin-top:3%;margin-bottom:3%;" class="col-md-12">
                                      <input type="submit" name="insert" class="btn btn-primary pull-right" id="btnContactUs" value="Envoyer">
                                  </div>
                              </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <form>
                          <legend><span class="glyphicon glyphicon-globe"></span>Notre bureau</legend>
                          <address>
                              <strong>INPT</strong><br>
                            ASEDS G6<br>
                             
                             
                          </address>
                          <address>
                              <strong>Adresse mail</strong><br>
                              <a href="mailto:#">G6ASEDS@gmail.com</a>
                          </address>
                          </form>
                      </div>
                  </div>
              </div>
              <div style="color:green;text-align:center;font-size:1.5vw;margin-bottom:5%;"><?php echo $contact_msg ?></div> 

            


 
