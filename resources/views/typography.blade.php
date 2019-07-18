<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   @extends('master.layout')
   @section('content')
   <body>
      <!--headder-->
      @include('includes.header')
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.html">Home</a>
                  <span>/ /</span>
               </li>
               <li>Typography</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--//banner -->
      <!--Typography-->
      <section class="inner-pages py-5">
         <div class="container py-xl-5 py-sm-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Typography</h3>
            <!-- forms -->
            <section class="typo-section py-4 border-top border-bottom">
               <h3 class="typo-main-heading mb-lg-4 mb-3 pr-3 pb-1">Forms</h3>
               <h4 class="typo-sub-heading mb-3">Grid System Form</h4>
               <!-- form1 -->
               <form>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="inputAddress">Address</label>
                     <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="form-group">
                     <label for="inputAddress2">Address 2</label>
                     <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                           <option selected="">Choose...</option>
                           <option>...</option>
                        </select>
                     </div>
                     <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        Check me out
                        </label>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
               </form>
               <!--// form1 -->
               <!-- form2 -->
               <h4 class="typo-sub-heading mt-4 mb-3">Horizontal form</h4>
               <form>
                  <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                     <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                     </div>
                  </div>
                  <fieldset class="form-group">
                     <div class="row">
                        <div class="col-form-label col-sm-2 pt-0">Radios</div>
                        <div class="col-sm-10">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                              <label class="form-check-label" for="gridRadios1">
                              First radio
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                              <label class="form-check-label" for="gridRadios2">
                              Second radio
                              </label>
                           </div>
                           <div class="form-check disabled">
                              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                              <label class="form-check-label" for="gridRadios3">
                              Third disabled radio
                              </label>
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <div class="form-group row">
                     <div class="col-sm-2">Checkbox</div>
                     <div class="col-sm-10">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="gridCheck1">
                           <label class="form-check-label" for="gridCheck1">
                           Example checkbox
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                     </div>
                  </div>
               </form>
               <!--// form2 -->
            </section>
            <!--// forms -->
            <!-- select-option -->
            <section class="typo-section py-4 border-bottom">
               <h3 class="typo-main-heading mb-lg-4 mb-3 pr-3 pb-1">Select Options</h3>
               <h4 class="typo-sub-heading mb-3">Custom select</h4>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text" for="inputGroupSelect01">Options</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01">
                     <option selected="">Choose...</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
               <div class="input-group mb-3">
                  <select class="custom-select" id="inputGroupSelect02">
                     <option selected="">Choose...</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
                  <div class="input-group-append">
                     <label class="input-group-text" for="inputGroupSelect02">Options</label>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <button class="btn btn-outline-secondary" type="button">Button</button>
                  </div>
                  <select class="custom-select" id="inputGroupSelect03">
                     <option selected="">Choose...</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
               <div class="input-group">
                  <select class="custom-select" id="inputGroupSelect04">
                     <option selected="">Choose...</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
                  <div class="input-group-append">
                     <button class="btn btn-outline-secondary" type="button">Button</button>
                  </div>
               </div>
            </section>
            <!--// select-option -->
            <!-- Modals -->
            <section class="typo-section py-4 border-bottom">
               <h3 class="typo-main-heading mb-lg-4 mb-3 pr-3 pb-1">Modal</h3>
               <!-- Live Demo -->
               <h4 class="typo-sub-heading mb-3">Live Demo Modal</h4>
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-two">
               Launch demo modal
               </button>
               <!-- Modal -->
               <div class="modal fade" id="exampleModal-two" tabindex="-1" role="dialog" aria-labelledby="exampleModal-twoLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModal-twoLabel">Modal title</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           ...
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--// Live Demo -->
               <!-- Optional sizes -->
               <h4 class="typo-sub-heading mt-4 mb-3">Optional sizes</h4>
               <!-- Large modal -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
               <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           ...
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Small modal -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>
               <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           ...
                        </div>
                     </div>
                  </div>
               </div>
               <!--// Optional sizes -->
               <!-- Vertically centered -->
               <h4 class="typo-sub-heading mt-4 mb-3">Vertically centered</h4>
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-one">
               Launch demo modal
               </button>
               <!-- Modal -->
               <div class="modal fade" id="exampleModalCenter-one" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header-one">
                           <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           ...
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--// Vertically centered -->
            </section>
            <!--// Modals -->
            <!-- Pagination -->
            <section class="typo-section py-4 border-bottom">
               <h3 class="typo-main-heading mb-lg-4 mb-3 pr-3 pb-1">Pagination</h3>
               <!-- Working with icons -->
               <h4 class="typo-sub-heading mb-3">Working with icons</h4>
               <nav aria-label="Page navigation example">
                  <ul class="pagination">
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                        </a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">1</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">2</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">3</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                        </a>
                     </li>
                  </ul>
               </nav>
               <!--// Working with icons -->
               <!-- Disabled and active states -->
               <h4 class="typo-sub-heading mt-4 mb-3">Disabled and active states</h4>
               <nav aria-label="...">
                  <ul class="pagination">
                     <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">1</a>
                     </li>
                     <li class="page-item active">
                        <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                        </span>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">3</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                     </li>
                  </ul>
               </nav>
               <!--// Disabled and active states -->
               <!-- Alignment -->
               <h4 class="typo-sub-heading mt-4 mb-3">Alignment</h4>
               <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                     <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">1</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">2</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">3</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                     </li>
                  </ul>
               </nav>
               <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                     <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">1</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">2</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">3</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                     </li>
                  </ul>
               </nav>
               <!--// Alignment -->
            </section>
            <!--// Pagination -->
            <!-- Cards -->
            <section class="typo-section py-4 border-bottom">
               <h3 class="typo-main-heading mb-lg-4 mb-3 pr-3 pb-1">Cards</h3>
               <!-- Titles, text, and linksr -->
               <h4 class="typo-sub-heading mb-3">Titles, text, and links</h4>
               <div class="card" style="width: 18rem;">
                  <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="#" class="card-link">Card link</a>
                     <a href="#" class="card-link">Another link</a>
                  </div>
               </div>
               <!--// Titles, text, and links -->
               <!-- Header and footer -->
               <h4 class="typo-sub-heading mt-4 mb-3">Header and footer</h4>
               <div class="card text-center">
                  <div class="card-header">
                     Featured
                  </div>
                  <div class="card-body">
                     <h5 class="card-title">Special title treatment</h5>
                     <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                  <div class="card-footer text-muted">
                     2 days ago
                  </div>
               </div>
               <!--// Header and footer -->
               <!-- Card columns -->
               <h4 class="typo-sub-heading mt-4 mb-3">Card columns</h4>
               <div class="card-columns">
                  <div class="card">
                     <img class="card-img-top" src="images/typo.jpg" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="card-title">Card title that wraps to a new line</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.
                           This content is a little bit longer.
                        </p>
                     </div>
                  </div>
                  <div class="card p-3">
                     <blockquote class="blockquote mb-0 card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">
                           <small class="text-muted">
                           Someone famous in
                           <cite title="Source Title">Source Title</cite>
                           </small>
                        </footer>
                     </blockquote>
                  </div>
                  <div class="card">
                     <img class="card-img-top" src="images/typo.jpg" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text">
                           <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                     </div>
                  </div>
                  <div class="card bg-primary text-white text-center p-3">
                     <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer class="blockquote-footer">
                           <small>
                           Someone famous in
                           <cite title="Source Title">Source Title</cite>
                           </small>
                        </footer>
                     </blockquote>
                  </div>
                  <div class="card text-center">
                     <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text">
                           <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                     </div>
                  </div>
                  <div class="card">
                     <img class="card-img" src="images/typo.jpg" alt="Card image">
                  </div>
                  <div class="card p-3 text-right">
                     <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">
                           <small class="text-muted">
                           Someone famous in
                           <cite title="Source Title">Source Title</cite>
                           </small>
                        </footer>
                     </blockquote>
                  </div>
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This
                           card has even longer content than the first to show that equal height action.
                        </p>
                        <p class="card-text">
                           <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                     </div>
                  </div>
               </div>
               <!--// Card columns -->
            </section>
            <!--// Cards -->
         </div>
      </section>
      <!--//typography -->
      
   </body>
</html>
