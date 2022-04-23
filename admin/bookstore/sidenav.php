<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="../dashboard.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-upload" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Upload</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-upload">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=UploadSyllabus">Syllabus</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=UploadBooks">Books</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=UploadNotes">Notes</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=UploadPaperSolutions">Paper Solutions</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=UploadNotice">Notice</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-edit" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
                <span class="menu-title">Edit</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-edit">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=EditSyllabus">Syllabus</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=EditBooks">Books</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=EditNotes">Notes</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=EditPaperSolutions">Paper Solutions</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=EditNotice">Notice</a></li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-view" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">View</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-view">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=ViewSyllabus">Syllabus</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=ViewBooks">Books</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=ViewNotes">Notes</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../selectsemdept.php?Page=ViewPapers">Paper Solutions</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../pages/ui-features/typography.html">Notice</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../bookstore/available_books.php?dept=All&sem=All">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Book Store</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../notestore/view_notes.php?dept=All&sem=All">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Notes Store</span>
              </a>
            </li>
            
          
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <a class="nav-link" href="../index.php">
                  <span class="menu-title">Log Out</span></a>
                </div>
              </div>
            </li>
            
          </ul>
        </nav>