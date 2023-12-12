@section('stylesheet')
    <style>
        body {
            background-image: url({{asset('/')}}front/assets/imgs/Backdrop.jpg);
        }
        .about-pg{
            font-size: 13px;
            margin-bottom: 10px;
            text-align: justify;
        }
    </style>
@endsection
@extends('front.master', ['body_class' => 'sticky-header left-side-collapsed'])
@section('title')
    Order Pizza Online For Delivery | Terms & Conditions
@endsection
    @section('body')
            <!-- main content start-->
            <div class="main-content">
                <!-- header-starts -->
                <div class="header-section">
                    <!--notification menu start -->
                    <div class="menu-right">
                        <div class="logo_bg edge-shadow">
                            <a href="{{route('all-pizza')}}">
                                <img style="width: 50%;" src="{{asset('/')}}front/assets/imgs/pizzahut-logo-icon.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            @unless(empty($back))
                @php($back_button = $back)
            @else
                @php($back_button = url()->previous())
            @endunless
                <div class="clearfix">
                    <div class="scroll-content" style="margin-top: 44px;">
                        <!--notification menu end -->
                        <div class="container" style="padding: 0px;">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase; margin-top: 10px;color: #424242;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        <div class="sr_back_button"><a href="{{ $back_button }}"><i class="fa fa fa-angle-left icon"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-md-10 text-center">
                                    <div class="toolbar-title toolbar-title-md" style="text-transform: uppercase;color: #424242; margin: 23px 0px 23px 10px; padding: 0px 55px;font-weight: 600; font-family: 'Open Sans Condensed', sans-serif;">
                                        <i class="fa fa-lock text-center" aria-hidden="true"></i> ABOUTUS
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contain-fluid">
                            <div class="login_wrapper">
                                <div class="input_field">
                                    {{--<form>--}}
                                    <div class="col-md-12" style="">
                                        {{--<form action="/action_page.php" style="border:1px solid #ccc">--}}
                                        <div class="container-fluid bg-white">
                                            <div class="row ">
                                                <div class="col-md-12 about-pg ">
                                                    <p>
                                                        These terms and conditions apply to the web site. Please read this
                                                        statement carefully. If you do not wish to be bound by these terms and
                                                        conditions, then you should not access this site. Access of this site by
                                                        you shall be deemed to be your acceptance of these terms and conditions.
                                                        <br/>
                                                        Privacy Policy Transcom Foods Limited is committed to protecting the
                                                        privacy of personal information you may provide Us on this Website (the
                                                        Site). We believe it is important for you to know how We treat your
                                                        personal information. The terms of this Privacy Policy apply to all
                                                        users of this Site. If you do not agree with the terms of this Privacy
                                                        Policy, you should immediately cease the use of this Site.
                                                        <br/>
                                                        Below you will find answers to several questions regarding Our Privacy
                                                        Policy.
                                                    </p>
                                                </div>
                                                <h2>WHAT INFORMATION DOES COMPANY COLLECT ABOUT ME ON THIS SITE?</h2>
                                                <div class="col-md-12 about-pg ">
                                                    <p>
                                                        Company collects personally identifiable information that you may
                                                        voluntarily provide on online forms, which may include: user
                                                        registration, contact requests, guest comments, online surveys, and
                                                        other online activities. The personally identifiable information
                                                        (Personal Information) collected on this Site can include some or all of
                                                        the following: your name, address, telephone number, email addresses,
                                                        demographic information, and any other information you may voluntarily
                                                        provide. You will have the choice whether or not to disclose such
                                                        Personal Information in the above activities; however, some parts of the
                                                        Site and some services may be more difficult or impossible to use if you
                                                        choose not to disclose Personal Information. At the time of
                                                        registration, you will have the option to receive future offers and
                                                        updates from the Company by checking the appropriate opt-in box. If you
                                                        choose to opt-in, your Personal Information will be kept in a secured
                                                        database and We will alert you via email to new features, special
                                                        offers, updated information and new services.
                                                        <br/>
                                                        In addition to the Personal Information identified above, Our Web
                                                        servers automatically identify computers by their IP addresses. Company
                                                        may use IP addresses to analyze trends, administer the Site, track users
                                                        movement and gather broad demographic information for aggregate use. To
                                                        emphasize, IP addresses are not linked to Personal Information.
                                                        <br/>
                                                        Further, Our Site may use technologies such as cookies to provide
                                                        visitors with tailored information upon each visit. Cookies are a common
                                                        part of many commercial Websites that allow small text files to be sent
                                                        by a Website, accepted by a Web browser and then placed on your hard
                                                        drive as recognition for repeat visits to the Site. Every time you visit
                                                        Our Site, Our servers, through cookies, pixels and/or GIF files, collect
                                                        basic technical information such as your domain name, the address of the
                                                        last URL visited prior to clicking through to the Site, and your browser
                                                        and operating system. You do not need to enable cookies to visit Our
                                                        Site; however, some parts of the Site and some services may be more
                                                        difficult or impossible to use if cookies are disabled. To emphasize,
                                                        cookies are not linked to any Personal Information while on this Site.
                                                        It does not contain your name, address, telephone number, or email
                                                        address.
                                                    </p>
                                                </div>
                                                <h2>WHAT DOES COMPANY DO WITH THE INFORMATION COLLECTED?</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        Company may use your Personal Information for any of the following
                                                        purposes:
                                                    <ul>
                                                        <li>To understand the use of the Site and make improvements;</li>
                                                        <li>To fulfill prizes;</li>
                                                        <li>To register visitors for online activities they choose to
                                                            participate in such as: contests, surveys, employment applications,
                                                            comment forms, or any other online interactive activities;
                                                        </li>
                                                        <li>To respond to specific requests from visitors;</li>
                                                        <li>To protect the security or integrity of the Site if necessary;</li>
                                                        <li>To send notices (if consent is provided) of special promotions,
                                                            offers or solicitations; and in general (if consent is provided), to
                                                            promote and market Company’s business and various products.
                                                        </li>
                                                    </ul>
                                                    </p>
                                                </div>
                                                <h2>WITH WHOM DOES COMPANY SHARE THE INFORMATION?</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        Company is a part of Yum! Brands, Inc. (Yum Brands). Yum Brands
                                                        includes: Pizza Hut, Inc., KFC U.S. Properties, Inc., Taco Bell Corp.,
                                                        and Yum Restaurants International, Inc.. Company may share Personal
                                                        Information collected on this Site with any member of Yum Brands and any
                                                        other future subsidiaries or affiliates. This Privacy Policy applies if
                                                        Company shares your Personal Information collected on this Site with any
                                                        other Yum Brands members. If you choose to provide your Personal
                                                        Information to other members of Yum Brands through their respective
                                                        Websites, then the respective Privacy Policies will apply. Company will
                                                        not sell, rent, loan, transfer, or otherwise disclose any Personal
                                                        Information to third parties except as set forth in this statement.
                                                        Company may share Personal Information with third parties under the
                                                        following circumstances: in connection with a court order, subpoena,
                                                        government investigation, or when otherwise required by law; in the
                                                        event of a corporate sale, merger, acquisition, or similar event; or
                                                        working with third party companies to support the Sites technical
                                                        operation or execute a specific promotion or program (such as providing
                                                        responses to the Guest Comments Page, conduct surveys, or maintain a
                                                        database of visitor information, etc.). If Personal Information is
                                                        shared with any third party for the purposes of executing a specific
                                                        promotion or program, the third party will have no right to use the
                                                        Personal Information for independent purposes. In support of this
                                                        policy, Company will enter into written agreements with any third party
                                                        receiving Personal Information requiring the third party to comply with
                                                        Company’s privacy policies and applicable laws.
                                                    </p>
                                                </div>
                                                <h2>HOW DOES COMPANY PROTECT THE SECURITY OF MY PERSONAL INFORMATION?</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        Company uses appropriate security measures to protect all Personal
                                                        Information collected in a secure, controlled environment. In addition,
                                                        Company configures the list server software to refuse to divulge the
                                                        email addresses of the list subscribers to anyone other than authorized
                                                        Company staff members, including other list subscribers. In the event of
                                                        a security breach whereby your Personal Information is acquired by an
                                                        unauthorized person, Company will take appropriate steps to contain the
                                                        breach to the extent reasonably possible.
                                                    </p>
                                                </div>
                                                <h2>DOES COMPANYS SITE LINK TO OTHER SITES?</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        Yes. This Site may contain links to other Websites that may not be owned or
                                                        operated by Company. Company cannot control nor is responsible for the
                                                        privacy practices or content of such other Websites. Company encourages you
                                                        to read the privacy statements of each and every Website that collects
                                                        personally identifiable information. This Privacy Policy applies solely to
                                                        Personal Information collected on this Site.
                                                    </p>
                                                </div>
                                                <h2>WHAT IS THE EFFECTIVE DATE OF COMPANY PRIVACY POLICY AND HOW WILL COMPANY NOTIFY ME
                                                    OF CHANGES TO ITS PRIVACY POLICY?</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        In the event that the Company goes through a business transition, such as a
                                                        merger, another company acquires Company or its Affiliates, or Company sells a
                                                        portion of its assets, your personal information will, in most instances, be
                                                        part of the assets transferred. Thirty days prior to the change of ownership or
                                                        control, you will be informed of this exchange and its effects via prominent
                                                        notice on Our site. As a result of a business transition, your personally
                                                        identifiable information may be used in a manner different from that stated at
                                                        the time of collection.
                                                    </p>
                                                </div>
                                                <h2>TRADEMARK NOTICE</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        This Website contains many valuable trademarks owned and used by Pizza Hut
                                                        Bangladesh. And its subsidiaries and affiliates throughout the world. These
                                                        trademarks are used to distinguish Pizza Hut Bangladesh’s quality products and
                                                        services. These trademarks and related proprietary property are protected from
                                                        reproduction and simulation under national and international laws and are not to
                                                        be
                                                        copied or used in any manner or in any medium without the express written
                                                        permission
                                                        of Pizza, Bangladesh.
                                                    </p>
                                                </div>
                                                <h2>COPYRIGHT NOTICE</h2>
                                                <div class="col-md-12 about-pg">
                                                    <p>
                                                        The text, graphics (except the trademarks as noted above) contained in this
                                                        Website
                                                        are the exclusive property of the Company. Except where otherwise noted, the
                                                        text,
                                                        graphics and webpage code contained here may not be modified, copied,
                                                        distributed,
                                                        displayed, reproduced uploaded or transmitted in any form or by any means
                                                        without
                                                        the prior written permission of the Company. Except that you may print and
                                                        download
                                                        portions of material from the different areas of the site solely for your own
                                                        non-commercial use provided that you agree not to change or delete any copyright
                                                        or
                                                        proprietary notices from the materials.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        {{--</form>--}}
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- The Modal -->
                        </div>
                    </div>
                </div>
                <!-- End of .clearfix -->

            </div>
            <!-- main content end-->
@endsection