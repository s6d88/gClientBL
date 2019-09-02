 <div id="sidebar" class=" py-3 col-md-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item">
                <a href="#" class="sidebar-link text-muted active">
                    <i class="o-home-1 mr-3 text-gray"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="#" data-toggle="collapse" data-target="#client" aria-expanded="false" aria-controls="client" class="sidebar-link text-muted">
                    <i class="o-user-1 mr-3 text-gray"></i>
                    <span> Clients</span>
                </a>
                <div id="client" class="collapse">
                    <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                        <li class="sidebar-list-item">
                            <a href="{{ url('clients') }}" class="sidebar-link text-muted pl-lg-5">Liste des Clients</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-list-item">
                <a href="#" data-toggle="collapse" data-target="#livraison" aria-expanded="false" aria-controls="livraison" class="sidebar-link text-muted">
                    <i class="fas fa-receipt mr-3 text-gray"></i>
                    <span>Bon de Livraison</span>
                </a>
                 <div id="livraison" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item">
                        <a href="{{ url('bon_livraison') }}" class="sidebar-link text-muted pl-lg-5">Liste des Bon de Livraison</a>
                </li>     
        </ul>
        </div>
    </li>
            
              
      </ul>
               
    </div>