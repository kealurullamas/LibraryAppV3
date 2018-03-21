<template>
   
    <!-- <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
            Notifications <span class="badge"  aria-hidden="true">{{notifications.length}}</span>
        </a> -->



    <li class="upper-links dropdown">
        <a class="links" href="#">
            <svg class="" width="16px" height="12px" style="overflow: visible;">
                <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
            </svg>
            <span class="badge"  aria-hidden="true">{{notifications.length}}</span>
        </a>
     
        <ul class="dropdown-menu" role="menu">
            <li v-for="notification in notifications">
                <a v-if="notification.data.request.due_date!=null" href="#" class="profile-links" v-on:click="MarkAsRead(notification)">
                    <small>Your Book <strong>{{notification.data.request.book.title}}</strong> is due on <strong>{{notification.data.request.due_date}}</strong></small>
                </a>
                <a v-if="notification.data.request.status!='Received'" href="#" class="profile-links" v-on:click="MarkAsRead(notification)">
                    <small>Your Book request of <strong>{{notification.data.request.book.title}}</strong> has been <strong>{{notification.data.request.status}}</strong></small>
                </a>
            </li>
            <li v-if="notifications.length>0" class="footer bg-dark text-center">
                <a href="" class="text-light">View All</a>
            </li>
            <li v-if="notifications.length==0">
               <small> There is no new Notification</small>
            </li>
        </ul>
    </li>

    <!-- <li class="nav-itema dropdown">
        <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <svg class="" width="16px" height="12px" style="overflow: visible;">
                <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
            </svg>
            <span class="badge"  aria-hidden="true">{{notifications.length}}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="head text-light bg-dark">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <span>Notifications (3)</span>
                    <a href="" class="float-right text-light">Mark all as read</a>
                </div>
            </div>
            </li>
            <li class="notification-box">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                </div>    
                <div class="col-lg-8 col-sm-8 col-8">
                    <strong class="text-info">David John</strong>
                        <div>
                            Lorem ipsum dolor sit amet, consectetur
                        </div>
                    <small class="text-warning">27.11.2015, 15:00</small>
                </div>    
            </div>
            </li>
            <li class="notification-box bg-gray">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                </div>    
                <div class="col-lg-8 col-sm-8 col-8">
                <strong class="text-info">David John</strong>
                <div>
                    Lorem ipsum dolor sit amet, consectetur
                </div>
                <small class="text-warning">27.11.2015, 15:00</small>
                </div>    
            </div>
            </li>
            <li class="notification-box">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                </div>    
                <div class="col-lg-8 col-sm-8 col-8">
                <strong class="text-info">David John</strong>
                <div>
                    Lorem ipsum dolor sit amet, consectetur
                </div>
                <small class="text-warning">27.11.2015, 15:00</small>
                </div>    
            </div>
            </li>
            <li class="footer bg-dark text-center">
            <a href="" class="text-light">View All</a>
            </li>
        </ul>
    </li> -->
</template>

<script>
    export default {
        props:['notifications'],
        methods: {
            MarkAsRead: function(notification){
                var data={
                    id: notification.id
                    
                };
                axios.post("http://localhost:8080/LibraryApp/public/notification/read",data).then(response=>{
                    window.location.href="http://localhost:8080/LibraryApp/public/dashboard";
                });
            }
        }
    }
</script>
