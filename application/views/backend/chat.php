<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body chat-bg " style="background-image: url(<?php echo base_url(); ?>assets/adminty/files/assets/images/chat-bg.jpg); background-size: cover;
    background-blend-mode: overlay;
    background-color: rgba(255, 255, 255, 0.45);">
                                <div class="page-wrapper">
                                    <div id="main-chat" class="container-fluid">



                                        <!-- Page-header start -->
                                        <div class="page-header">
                                            <div class="row align-items-end">
                                                <div class="col-lg-8">
                                                    <div class="page-header-title">
                                                        <div class="d-inline">
                                                            <h4>Chat API</h4>
                                                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="page-header-breadcrumb">
                                                        <ul class="breadcrumb-title">
                                                            <li class="breadcrumb-item">
                                                                <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                            </li>
                                                            <li class="breadcrumb-item"><a href="#!">Pages</a>
                                                            </li>
                                                            <li class="breadcrumb-item"><a href="#!">Sample page</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Page-header end -->


                                        <div class="page-body">
                                            <div class="row">
                                                <div class="chat-box">
                                                    <ul class="text-right boxs">
                                                        <li class="chat-single-box card-shadow bg-white active" data-id="1">
                                                            <div class="had-container">
                                                                <div class="chat-header p-10 bg-gray">
                                                                    <div class="user-info d-inline-block f-left">
                                                                        <div class="box-live-status bg-danger  d-inline-block m-r-10"></div>
                                                                        <a href="#">Josephin Doe</a>
                                                                    </div>
                                                                    <div class="box-tools d-inline-block">
                                                                        <a href="#" class="mini">
<i class="icofont icofont-minus f-20 m-r-10"></i>
</a>
                                                                        <a class="close" href="#">
<i class="icofont icofont-close f-20"></i>
</a>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-body p-10">
                                                                    <div class="message-scrooler">
                                                                        <div class="messages">
                                                                            <div class="message out no-avatar media">
                                                                                <div class="body media-body text-right p-l-50">
                                                                                    <div class="content msg-reply f-12 bg-primary d-inline-block">Good morning..</div>
                                                                                    <div class="seen"><i class="icon-clock f-12 m-r-5 txt-muted d-inline-block"></i><span>a few seconds ago </span>
                                                                                        <div class="clear"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="sender media-right friend-box">
                                                                                    <a href="javascript:void(0);" title="Me"><img src="<?php echo base_url(); ?>assets\adminty\files\assets\images\avatar-1.jpg" class="  img-chat-profile" alt="Me"></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="chat-footer b-t-muted">
                                                                    <div class="input-group write-msg">
                                                                        <input type="text" class="form-control input-value" placeholder="Type a Message">
                                                                        <span class="input-group-btn">
<button id="paper-btn" class="btn btn-primary" type="button">
<i class="icofont icofont-paper-plane"></i>
</button>
</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li> 
                                                    </ul>
                                                    <div id="sidebar" class="users p-chat-user">
                                                        <div class="had-container">
                                                            <div class="card card_main p-fixed users-main ">
                                                                <div class="user-box">
                                                                    <div class="card-block">
                                                                        <div class="right-icon-control">
                                                                            <input type="text" class="form-control  search-text" placeholder="Search Friend">
                                                                            <div class="form-icon">
                                                                                <i class="icofont icofont-search"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="user-groups">
                                                                        <h6>Groups</h6>
                                                                        <ul>
                                                                            <li class="frnds">Friends</li>
                                                                            <li class="work">Work</li>
                                                                        </ul>
                                                                    </div>
                                                                    
																	<?php 
																		if(isset($employee) && !empty($employee)){
																			$x=1;
																			foreach($employee as $employeeobj){
																				if($employeeobj['id'] != $this->session->userdata('id')){
																	?>
                                                                    <div class="media userlist-box" data-id="<?php echo $x; ?>" data-status="<?php if($employeeobj['live'] == 1){ echo 'online'; }else{ echo 'offline'; } ?>" data-username="<?php echo $employeeobj['first_name'].' '.$employeeobj['last_name']; ?>" data-toggle="tooltip" data-placement="left" title="<?php echo $employeeobj['first_name'].' '.$employeeobj['last_name']; ?>">
																		<a class="media-left" href="#!">
																			<?php if(!empty($employeeobj['em_image'])){ ?>
																			<img class="media-object  " src="<?php echo base_url(); ?>assets/images/users/<?php echo $employeeobj['em_image']; ?>" alt="Generic placeholder image">
																			
																			<?php }else{ ?>
																			<img class="media-object  " src="<?php echo base_url(); ?>assets/images/users/user.png" alt="Generic placeholder image">
																			
																			<?php } ?>
																			<?php 
																				if($employeeobj['live'] == 1){ 
																			?>
																			<div class="live-status bg-success"></div>
																			<?php }else{ ?>
																			<div class="live-status bg-danger"></div>
																			<?php } ?>
																		</a>
                                                                        <div class="media-body">
                                                                            <div class="f-13 chat-header"><?php echo $employeeobj['first_name'].' '.$employeeobj['last_name']; ?></div>
                                                                        </div>
                                                                    </div>
																	<?php 
																		$x++;
																			}}
																		}
																	?>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="page-error">
                                            <div class="card text-center">
                                                <div class="card-block">
                                                    <div class="m-t-10">
                                                        <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                                                        <h4 class="f-w-600 m-t-25">Not supported</h4>
                                                        <p class="text-muted m-b-0">Chat not supported in this device</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
<?php $this->load->view('backend/footer'); ?>
<script>
function boxMinimizedCount() {

    var _count = $('#main-chat .chat-single-box.minimized .chat-dropdown li').length;

    $('#main-chat .chat-single-box.minimized .count span').html($('#main-chat .chat-single-box.minimized .chat-dropdown li').length);

    if (_count == 0) {
        $('#main-chat .chat-single-box.minimized').remove();
    }
}


function boxMinimizedUserAdd() {

    var _boxHidden = $('#main-chat .chat-single-box:not(".minimized"):not(".hidden")').eq(0);
    _boxHidden.addClass('hidden');
    var dataId = _boxHidden.data('id');

    var hasItem = false;
    $('#main-chat .chat-single-box.minimized .chat-dropdown li').each(function () {
        if ($(this).data('id') == dataId) {
            hasItem = true;
        }
    });

    if (!hasItem) {

        var dataUserName = _boxHidden.find('.user-info a').text();
        $('#main-chat .chat-single-box.minimized .chat-dropdown').append(box_minimized_dropdownLi.format(dataId, dataUserName));
    }
}

var box_minimized_dropdownLi = '<li data-id="{0}"><div class="username">{1}</div> <div class="remove">X</div></li>'
function boxMinimized() {

    var _boxDefaultWidth = parseInt($('#main-chat .chat-single-box:not(".minimized")').css('width'));
    var _boxCommonWidth = parseInt($('.chat-box').css('width').replace('px', ''), 10)  + parseInt($('#sidebar').css('width').replace('px', ''), 10);
    var _windowWidth = $(window).width();
    var _hasMinimized = false;

    $('#main-chat .boxs .chat-single-box').each(function (index) {

        if ($(this).hasClass('minimized')) {

                _hasMinimized = true;

        }
    });

    if ((_windowWidth) > (_boxCommonWidth)) {

        if (!_hasMinimized) {
           if((_windowWidth)< 768 ){

                    $(".chat-box").css('margin-right','70px');
                    return;
           }
           else{
                 return;
           }

        }

        var dataId = $('#main-chat .boxs .minimized .chat-dropdown li').last().data('id');
        $('#main-chat .boxs .minimized .chat-dropdown li').last().remove();
        $('#main-chat .boxs .chat-single-box').each(function (index) {

            if ($(this).data('id') == dataId) {
                $(this).removeClass('hidden');
                return false;
            }
        });
    } else {
        if (!_hasMinimized) {

            $('#main-chat .boxs').prepend('<li class="chat-single-box minimized"><div class="count"><span>0</span></div><ul class="chat-dropdown"></ul></li>');
        }

        boxMinimizedUserAdd();

    }

    boxMinimizedCount();
}



$(window).on('resize',function () {

    boxMinimized();
    sidebarClosed();
});
$(function () {

    var waveEffect = $('.user-box').attr('wave-effect');
    var waveColor = $('.user-box').attr('wave-color');
    if (waveEffect == 'true') {

        $('#sidebar .user-box .userlist-box').each(function (index) {
            $(this).addClass('waves-effect ' + waveColor);
        });
    }

    initialTooltip();
    messageScroll();
    generatePlaceholder();

    boxMinimized();
});



$(document).on('click', '#main-chat .chat-single-box', function () {

    if ($(this).hasClass('new-message')) {

        $(this).removeClass('new-message');
    }
    ActiveChatBox(this);
});

$(document).on('click', '#main-chat .chat-header .user-info', function () {

    removeBoxCollapseClass($(this).parents('.chat-single-box'));

    messageScroll();
});

$(document).on('click', '#main-chat .chat-single-box .mini', function () {

    parent = $(this).parents('.chat-single-box');

    if ($(parent.children()[0].children[0]).hasClass('custom-collapsed')) {

        $(parent.children()[0].children[0]).removeClass('custom-collapsed');
        $(parent.children()[0].children[1]).css('display','block');
         $(parent.children()[0].children[2]).css('display','block');
       parent.addClass('bg-white');
       parent.addClass('card-shadow');
        messageScroll();
    } else {
       parent.removeClass('bg-white');
       parent.removeClass('card-shadow');
       $(parent.children()[0].children[0]).addClass('custom-collapsed');
        $(parent.children()[0].children[1]).css('display','none');
         $(parent.children()[0].children[2]).css('display','none');
    }

});

$(document).on('click', '#main-chat .chat-single-box .close', function () {

    parent = $(this).parents('.chat-single-box');
    if (parent.hasClass('active')) {

        parent.remove();
        setTimeout(function () { $('#main-chat .boxs .chat-single-box:last-child').addClass('active'); }, 1);
    }
    parent.remove();
    parent.find('.close_tooltip').tooltip('dispose');

    boxMinimized();
});

/*Click on username*/
$(document).on('click', '#main-chat #sidebar .user-box .userlist-box', function () {

    var dataId = $(this).attr('data-id');
    var dataStatus = $(this).data('status');
    var dataUserName = $(this).attr('data-username');
    var _return = false;

    $('#main-chat .chat-box .boxs .chat-single-box').each(function (index) {

        if ($(this).attr('data-id') == dataId) {

            removeBoxCollapseClass(this);
            ActiveChatBox(this);
            _return = true;
        }
    });


    if (_return) {

        return;
    }
    if(dataStatus == "online"){

    var newBox = '<li class="chat-single-box card-shadow bg-white active" data-id="{0}"><div class="had-container"><div class="chat-header p-10 bg-gray"><div class="user-info d-inline-block f-left"><div class="box-live-status bg-danger  d-inline-block m-r-10"></div><a href="#">{1}</a></div><div class="box-tools d-inline-block"><a href="#" class="mini"><i class="icofont icofont-minus f-20 m-r-10"></i></a><a class="close" href="#"><i class="icofont icofont-close f-20"></i></a></div></div><div class="chat-body p-10"><div class="message-scrooler"><div class="messages"></div></div></div><div class="chat-footer b-t-muted"><div class="input-group write-msg"><input type="text" class="form-control input-value" placeholder="Type a Message"><span class="input-group-btn"><button  id="paper-btn" class="btn btn-primary "  type="button"><i class="icofont icofont-paper-plane"></i></button></span></div></div></div></li>';
    }
    else{

        var newBox = '<li class="chat-single-box card-shadow bg-white active" data-id="{0}"><div class="had-container"><div class="chat-header p-10 bg-gray"><div class="user-info d-inline-block f-left"><div class="box-live-status bg-danger  d-inline-block m-r-10"></div><a href="#">{1}</a></div><div class="box-tools d-inline-block"><a href="#" class="mini"><i class="icofont icofont-minus f-20 m-r-10"></i></a><a class="close" href="#"><i class="icofont icofont-close f-20"></i></a></div></div><div class="chat-body p-10"><div class="message-scrooler"><div class="messages"></div></div></div><div class="chat-footer b-t-muted"><div class="input-group write-msg"><input type="text" class="form-control input-value" placeholder="Type a Message"><span class="input-group-btn"><button  id="paper-btn" class="btn btn-primary "  type="button"><i class="icofont icofont-paper-plane"></i></button></span></div></div></div></li>';
    }

    $('#main-chat .chat-single-box').removeClass('active');
    $('#main-chat .chat-box .boxs').append(newBox.format(dataId, dataUserName, dataStatus));
    generatePlaceholder();
    messageScroll();
    boxMinimized();
    initialTooltip();




});

$(document).on('focus', '#main-chat .textarea', function () {

    if ($(this).html() == '<span class="placeholder">{0}</span>'.format($(this).data('placeholder'))) {

       $(this).html('');
    }
});

$(document).on('blur', ' #main-chat .textarea', function () {

    if ($(this).html() == '') {

        $(this).html('<span class="placeholder">{0}</span>'.format($(this).data('placeholder')));
    }
});

$(document).on('click', '#main-chat .sidebar-collapse', function () {

    if ($('#main-chat').hasClass('sidebar-closed')) {

        $('#main-chat').removeClass('sidebar-closed');

        $('#main-chat .search input').attr('placeholder', '');
        $('#main-chat .search').css('display', 'block');


        deinitialTooltipSiderbarUserList();



    } else {

        $('#main-chat').addClass('sidebar-closed');

        $('#main-chat .search input').attr('placeholder', $('.search input').data('placeholder'));
        $('#main-chat .search').css('display', 'none');
        $('#main-chat .search').removeAttr('style');
        $('#main-chat .searchbar-closed').removeAttr('style');


        initialTooltipSiderbarUserList();
    }
});

$(document).on('click', '#main-chat .searchbar-closed', function () {

    $('#main-chat .sidebar-collapse').click();
    setTimeout(function () { $('#main-chat .searchbar input').focus(); }, 50);
    return false;
});

$(document).on('click', '#main-chat .chat-single-box .maximize', function () {

   /* window.open('inbox.html', 'window name', "width=300,height=400,scrollbars=yes");
    $(this).parents('.chat-single-box').remove();
    $('.maximize').tooltip('dispose');*/
     parent = $(this).parents('.chat-single-box');
      $(parent.children()[0].children[0]).removeClass('custom-collapsed');
        $(parent.children()[0].children[1]).css('display','block');
         $(parent.children()[0].children[2]).css('display','block');
       parent.addClass('bg-white');
       parent.addClass('card-shadow');
        messageScroll();
    return false;
});



$(document).on('click', '#main-chat .boxs .minimized .count', function (e) {

    e.stopPropagation();
    hideStickerBox();
    var _parent = $(this).parents('.minimized');

    if (_parent.hasClass('show')) {

        hideMinimizedBox();
    } else {

        _parent.addClass('show');
        var _bottom = parseInt(_parent.css('height').replace('px', ''),0) + 10;
        _parent.find('.chat-dropdown').css({
            'display': 'block',
            'bottom': _bottom
        });
    }
});

$(document).on('click', '#main-chat .boxs .minimized .chat-dropdown .username', function (e) {

    e.stopPropagation();
    var selectedDataId = $(this).parent().data('id');

    $(this).parent().remove();

    boxMinimizedUserAdd();

    $('#main-chat .boxs .chat-single-box').each(function (index) {

        if ($(this).data('id') == selectedDataId) {

            $(this).removeClass('hidden').removeClass('custom-collapsed');
            ActiveChatBox($(this));
        }
    });
});

$(document).on('click', '#main-chat .boxs .minimized .chat-dropdown .remove', function (e) {

    e.stopPropagation();
    var _parent = $(this).parents('.chat-dropdown li');
    dataId = _parent.data('id');

    $('#main-chat .chat-single-box').each(function () {

        if ($(this).data('id') == dataId) {
            $(this).remove();
        }
    });
    _parent.remove();

    boxMinimizedCount();
});

</script>
 <script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\chat\js\mmc-common.js"></script>
  <!--   <script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\chat\js\mmc-chat.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\chat\js\chat.js"></script>