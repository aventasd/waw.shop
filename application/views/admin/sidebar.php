   <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Blank Page</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="<?php if($this->uri->segment(2) == 'categories') {echo 'active '; }?>">
                      <a href="/admin/categories"><i class="icon mdi  mdi-border-all"></i><span>Categories</span></a>
                    <!-- <ul class="sub-menu">
                      <li><a href="/admin/categories">Categories</a>
                      </li>
                     <li class="active"><a href="index.html">Blank Page Header</a>
                      </li>
                      <li><a href="pages-blank-aside.html">Page Aside</a>
                      </li>
                      <li><a href="pages-login.html">Login</a>
                      </li>
                      <li><a href="pages-404.html">404 Page</a>
                      </li>
                      <li><a href="pages-sign-up.html">Sign Up</a>
                      </li>
                      <li><a href="pages-forgot-password.html">Forgot Password</a>
                      </li>
                    </ul>
                    
                     <li class="<?php if($this->uri->segment(2) == 'users') {echo 'active '; }?>">
                      <a href="/admin/users"><i class="icon mdi  mdi-face"></i><span>Users</span></a>                    
                  </li>
                    
                    -->
                  </li>


                  <li class="<?php if($this->uri->segment(2) == 'products') {echo 'active '; }?>">
                      <a href="/admin/products"><i class="icon mdi  mdi-layers"></i><span>Products</span></a>                    
                  </li>
                  <li class="<?php if($this->uri->segment(2) == 'filters') {echo 'active '; }?>">
                      <a href="/admin/filters"><i class="icon mdi  mdi-storage"></i><span>Filters</span></a>                    
                  </li>
                 
                   <li class="<?php if($this->uri->segment(2) == 'colors') {echo 'active '; }?>">
                      <a href="/admin/colors"><i class="icon mdi  mdi-invert-colors"></i><span>Colors</span></a>                    
                  </li>
                  
                  <li class="<?php if($this->uri->segment(2) == 'accessories') {echo 'active '; }?>">
                      <a href="/admin/accessories"><i class="icon mdi  mdi-network-setting"></i><span>Options</span></a>                    
                  </li>

                    <li class="<?php if($this->uri->segment(2) == 'promo') {echo 'active '; }?>">
                        <a href="/admin/promo"><i class="icon mdi  mdi-case-check"></i><span>Promo Codes</span></a>
                    </li>
                  
                  <li class="<?php if($this->uri->segment(2) == 'shipping') {echo 'active '; }?>">
                      <a href="/admin/shipping"><i class="icon mdi  mdi-truck"></i><span>Shipping</span></a>                    
                  </li>

                    <li class="<?php if($this->uri->segment(2) == 'orders') {echo 'active '; }?>">
                        <a href="/admin/orders"><i class="icon mdi  mdi-layers"></i><span>Orders</span></a>
                    </li>

                    <li class="<?php if($this->uri->segment(2) == 'users') {echo 'active '; }?>">
                        <a href="/admin/users"><i class="icon mdi  mdi-accounts"></i><span>Users</span></a>
                    </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="progress-widget">
            <div class="progress-data"><span class="progress-value">75%</span><span class="name">Project Development</span></div>
            <div class="progress">
              <div style="width: 75%;" class="progress-bar progress-bar-primary"></div>
            </div>
          </div>
        </div>
      </div>