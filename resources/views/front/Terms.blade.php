@php
$web = DB::table('websettings')->first();
$home = DB::table('homedetails')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--favicon icon-->
    <link rel="icon" href="https://i.ibb.co/X2V26G9/logo-removebg-preview.png" type="image/png" sizes="16x16">
    <!--title-->
    <title>{{ $web->website_tagline }}</title>
    <!--build:css-->

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin-assets/fonts/line-awesome/line-awesome.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin-assets/vendors/js/sweet-alert/jquery.sweet-modal.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-assets/css/main1.css') }}">
    <!-- endbuild -->
</head>

<body>
    <!--preloader start-->
    <div id="preloader">
        <div class="preloader-wrap">
            <img src="https://i.ibb.co/X2V26G9/logo-removebg-preview.png" alt="logo" width="80" class="img-fluid" />
            <div class="thecube">
                <div class="cube c1"></div>
                <div class="cube c2"></div>
                <div class="cube c4"></div>
                <div class="cube c3"></div>
            </div>
        </div>
    </div>
    <!--preloader end-->
    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="height:45px;">
                    <img src="https://i.ibb.co/X2V26G9/logo-removebg-preview.png" alt="logo" height="60px" width="160px" class="" style="margin-top:1px;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>

                <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto menu">
                        <li><a href="{{ url('/') }}" class=""> Home</a></li>
                        <li><a href="#about" class="page-scroll">About</a></li>
                        <li><a href="#features" class="page-scroll">Features</a></li>
                        <li><a href="#screenshots" class="page-scroll">Screenshots</a></li>
                        <li><a href="#faq" class="page-scroll">Faq</a></li>
                        <li><a href="#process" class="page-scroll">Review</a></li>
                        <li><a href="#contact" class="page-scroll">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header section end-->

    <div class="main">
        <!--page header section start-->
        <section class="page-header-section ptb-100 bg-image this_is_cusrtom" image-overlay="8">
            <div class="background-image-wraper" style="background: url('assets/img/slider-bg-1.jpg'); opacity: 1;">
            </div>
            <div class="container">
                <br><br>
                <div class="row align-items-center">
                    <div class="col-md-9 col-lg-7">
                        <div class="page-header-content text-white pt-4">
                            <h1 class="text-white mb-0 font-weight-bold">{{ $web->terms_title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page header section end-->

        <!--breadcrumb section start-->
        <div class="breadcrumb-bar gray-light-bg border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb pl-0 mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Terms & Condition</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumb section end-->

        <!--blog section start-->
        <div class="module pt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <center>
                            <!-- Post-->
                            <article class="post">
                                <div class="post-wrapper">
                                    <div class="post-header">
                                        <h2 class="post-title">{{ $web->terms_title }}</h2>
                                    </div>
                                    <div class="post-content">
                                        <p><strong>Boomlly</strong> is an online platform offered by <strong>Firehawks 24x7 Games Private Limited</strong> (hereinafter referred to as “Company”, “We”, “Us”, or “Our”) that enables any person (“You” or “Your” or “User”) to play the game of ludo online. These terms and conditions of use (“Terms”) along with Privacy Policy (“Privacy Policy”), Fair Play Policy (“Fair Play Policy”), and the cumulative set of Game Rules (defined below) (together, “Platform Policies”) form a legally binding agreement between You and the Company and forms the basis on which You may visit, access, or use our website (<strong>www.boomlly.com</strong>), the Boomlly mobile applications, including any subdomains of the website, APIs, widgets and/or any data, information, text, graphics, video, sound, pictures, and any other materials appearing, sent, uploaded, communicated, transmitted, or otherwise made available via the Platform (jointly referred to as the “Content”) for participating in various contests and games hosted on the Platform (“Services”).</p>

                                        <p>Your use of the Platform and the Services indicates Your acceptance of the Platform Policies and hence You are advised to read the Platform Policies carefully before using Our Services. You acknowledge that We provide use and access to our Platform and Services to You, subject to these Terms. You agree and acknowledge that you have completely read and understood the Platform Policies incorporated herein by reference, as amended from time to time. You agree, covenant, and undertake to be bound by the specific rules and regulations of each of the various formats of the Game as applicable. If You do not accept any part of the Platform Policies or any subsequent modification therein, You must stop accessing or using Our Services.</p>

                                        <p>We reserve the right to periodically review, update, or otherwise modify any part of the Platform Policies at Our sole and absolute discretion, and accordingly, You are advised to keep Yourself updated on the latest versions of the Platform Policies. We will provide You with notice of any material modification to the Platform Policies, and Your continued access and use of the Services after such notification shall constitute consent to the modified Platform Policies.</p>

                                        <p>In the event where one or more of the terms hereunder are determined to be invalid or unlawful for any reason, by a competent judicial or quasi-judicial authority in India, the validity or enforceability of the remaining terms will not be affected and the same will be valid and binding on You.</p>

                                        <p><strong>1. Definitions:</strong></p>

                                        <p><strong>1.1. “Applicable Law(s)”</strong> means all applicable statutes, enactments, laws, ordinances, treaties, conventions, protocols, bye-laws, rules, regulations, guidelines, notifications, notices, and/ or judgments, decrees, injunctions, writs or orders, instructions, decisions of any court or any awards or other requirements or official directives of any governmental authority, in any jurisdiction, as may be applicable to the relevant person.</p>

                                        <p><strong>1.2. “Bank Account”</strong> means a financial account maintained with a Banking Company or a financial institution and shall include a wallet maintained with an entity authorized by Reserve Bank of India.</p>

                                        <p><strong>1.3. “Banking Company”</strong> means a banking company as defined under section 5(c) of the Banking Regulation Act, 1949.</p>

                                        <p><strong>1.4. “Barred States”</strong> means any state in the territory of India where online gaming has been prohibited under Applicable Laws.</p>

                                        <p><strong>1.5. “Cash Games”</strong> mean Games involving a financial stake, as determined by the participants of that Game, in accordance with the Game Rules.</p>

                                        <p><strong>1.6. “Communication Feature”</strong> means the in-game feature that enables users to interact with each other during a Game.</p>

                                        <p><strong>1.7. “Deposit Segment”</strong> means the segment of the User account to which the money deposited by a User is credited.</p>

                                        <p><strong>1.8. “Discounts”</strong> shall include any Game Cash, Free Cash/ LS Cash, Rakeback, variable discounts, prizes or any other incentives (such as bonus, instant cash, Leaderboard) that may be provided by the Company, at its discretion, as a part of a promotional measure that shall be adjusted against the Service Fee chargeable from the User in such manner as may be prescribed under these Terms.</p>

                                        <p><strong>1.9. “FreeCash/LS Cash”</strong> is an incentive provided by the Company at its discretion, as a part of a promotional measure that is first attributable against the Service Fee charged by the Company in respect of a particular Cash Game.</p>

                                        <p><strong>1.10. “Game(s)”</strong> means the game of ludo offered on Boomlly and shall include the various formats and variations of ludo available on the Platform.</p>

                                        <p><strong>1.11. “Game Rules”</strong>, for each Game, means the rules and regulations applicable to a Game which are accessible on the Platform.</p>

                                        <p><strong>1.12. “Platform”</strong> means the Ludo Select website and related mobile applications on which Games are made available to users in different formats and variations.</p>

                                        <p><strong>1.13. “Platform Policies”</strong> mean the Terms, Privacy Policy, and Fair Play Policy of Ludo Select and the cumulative set of Game Rules for each Game.</p>

                                        <p><strong>1.14. “Rakeback”</strong> means an incentive provided by the Company at its discretion, as a part of the promotional measure vide which a certain percentage of Service Fee collected from the User in a particular gameplay or multiple gameplays, as determined by the Company, shall be credited back to the User's Deposit Segment at the time of gameplay settlement.</p>

                                        <p><strong>1.15. “Refund”</strong> means the reversal of the amounts (such as Service Fee, buy-in, or any other amount, as the case may be) paid by a User to play a Cash Game, to such User's account.</p>

                                        <p><strong>1.16. “Service Fee”</strong> means the fee charged by the Company from each user on every gameplay. The term “Commission” or “Platform Fee” can be used interchangeably with “Service Fee” and shall have the same meaning as assigned to “Service Fee”.</p>

                                        <p><strong>1.17. “Terms”</strong> mean the Terms of Service of Boomlly.</p>

                                        <p><strong>1.18. “Withdrawable Balance”</strong> means the amount in the Winning Segment and Deposit Segment.</p>

                                        <p><strong>1.19. “Withdrawal/Withdraw”</strong> means the transfer of all or part of the Withdrawable Balance to a designated Bank Account of a user, upon specific instructions by that user to the Company to initiate such transfer.</p>

                                        <p><strong>1.20. “Withdrawal Request”</strong> means a request by the user on the Platform to initiate Withdrawal.</p>

                                        <p><strong>1.21. “Winning Segment”</strong> means the segment of the User account to which the winnings of users from the Cash Games are credited, less the applicable Service Fees and other levies/deductions.</p>

                                        <p><strong>2. Who may use Our Services:</strong></p>

                                        <p><strong>2.1. Our Services</strong> are not intended for or offered to any person below the age of eighteen (18) years, or persons who are resident in or access the Platform from, any of the Barred States. We, at all times have the right to control access to Our Services, in any State in India, and reserve the right to update the list of Barred States.</p>

                                        <p><strong>2.2. If You</strong> are below the age of eighteen (18) years or a resident or located in any of the Barred States, You may not access and use Our Services. In case You do, You shall be solely responsible for any legal actions that may ensue from such use of Our Services. We reserve the right to request proof of age and geolocation at any stage of Your access and use of Our Services to verify that persons below the age of eighteen (18) years or residing or located in any Barred States are not using the Service. We may exclude a person from using Our Services where We suspect that such person using the Service is under-age and he/she fails to provide Us with a valid proof of age or is located in a Barred State.</p>

                                        <p><strong>2.3. If You</strong> are not legally competent to individually enter into Indian Rupee transactions through banking channels in India and/or are accessing the Services from a Barred State, You are prohibited from participating in Cash Games on Our Services. In the event of such violation, Your participation in Cash Games will be deemed to be in breach of the Platform Policies and You will not be entitled to receive any prize that You might win in such Cash Games.</p>

                                        <p><strong>2.4. We</strong> may terminate Your access and use of the Services when We become aware of or are of the opinion, at Our sole discretion, that Your use and access of Our Service is in violation of the Platform Policies.</p>

                                        <p><strong>3. Usage of Our Services:</strong></p>

                                        <p><strong>3.1. The</strong> Game(s) offered on the Platform is a game of skill and the Company does not support, endorse, or offer to Users any game of chance. A game is considered to be a game of skill where the impact of a player's effort and skill on the outcome of a game is higher than the impact of luck on the outcome of a game. Game(s) hosted on the Platform is a game of skill, as the outcome/success in the game is directly dependent on the Users' effort, performance and skill.</p>

                                        <p><strong>4. User Registration and Account Creation:</strong></p>

                                        <p><strong>4.1. In</strong> order to access the Platform and the Services, You will be required to create an account and register yourself on the Platform by providing a valid phone number or such other information as may be required (“Account”). You agree to provide true, accurate, current and complete information at the time of registration and at all other times (as required by the Company). You are prohibited from creating or using multiple accounts on the Platform. If we detect multiple accounts for a single user, we may take penal action, including cancellation of all amounts in relation to Discounts on linked accounts, and suspension of the linked accounts.</p>

                                        <p><strong>4.2. When</strong> You create an Account with Us, a default username is generated for You, You may amend or change your display name which shall be your identity (“User ID”) on the Platform. Your chosen display name is confirmed subject to it being in compliance with these Terms. User IDs must not be indecent, objectionable, offensive, or unlawful. User IDs that are found to violate the intellectual property of any entity, reveal personal information, or be suggestive of an advertising or promotional activity, may be rejected. Your User ID will remain active on the Platform unless We terminate or suspend Your access to the Platform for a violation of the Platform Policies in accordance with these Terms, or Your Account becomes inactive in accordance with Clause 11.</p>

                                        <p><strong>4.3. When</strong> You register with Us, You agree to receive promotional messages, administrative messages and advertisements from the Company and/or its affiliates, through SMS, email, call and push notifications. You may withdraw Your consent to receive such notifications by sending an email to <a href="mailto:boomlly24x7com">boomlly24x7com</a>.</p>

                                        <p><strong>4.4. You</strong> acknowledge and agree that any instruction or communication transmitted by You or on Your behalf through the Platform is made at your own risk. You authorize the Company to rely and act on, and treat as fully authorized and binding upon You, any instruction given to us through Your Account. You acknowledge and agree that We shall be entitled to rely upon your username to identify You and You represent and warrant to Us that, throughout the course of your usage of our Platform, you will not permit other persons to access or use your Account. If you permit other persons to access or use your Account, you do so at your own sole risk as to any consequences. You further agree and accept that you shall not access or use the Platform through the Account of another User.</p>

                                        <p><strong>4.5. You</strong> agree and give your consent to the Company to disclose your personal information provided to us to a third-party agency to assist in verifying your identity. The third-party agency may prepare and provide the Company with such an assessment and may use your personal information including the name, dates of birth, financial information etc. for the purposes of preparing such assessment. Please refer to our Privacy Policy in this regard.</p>

                                        <p><strong>4.6. You</strong> acknowledge that your participation in any Game(s) available on the Platform is purely voluntary and at your sole discretion and risk.</p>

                                        <p><strong>5. Game Formats and Rules:</strong></p>

                                        <p><strong>5.1. The</strong> Platform provides the game of ludo in various formats and variations, including Cash Games and non-cash Games. We may increase or reduce the number of Game formats and variations offered on the Platform, at Our sole discretion.</p>

                                        <p><strong>5.2. You</strong> agree to abide by the applicable Game Rules when playing Games on the Platform. You are required to ensure that You have read and understood the applicable Game Rules before playing any Game. The Game Rules form part of the Platform Policies and can be found by clicking “i” next to the heading of the type of game selected by You on the Platform.</p>

                                        <p><strong>5.3. We</strong> may, from time to time, make additional Games available on the Platform. The Platform Policies will govern all aspects of such newly introduced Games, and the relevant Game Rules for such new Game(s) will be made available to You.</p>

                                        <p><strong>5.4. The</strong> results and winners of each of the Games are determined in accordance with the applicable Game Rules. By registering and/or participating in any Game You agree to these determinations, which shall not be open to challenge. We will post lists of winners on Our Platform following each Game.</p>

                                        <p><strong>5.5. In</strong> case anything provided in the game rules/FAQ (suggestive or otherwise) as appearing over the Platform are contrary to these Terms, these Terms shall prevail over to the extent they are contrary to the games rules/FAQs.</p>

                                        <p><strong>6. Restrictions on the use of Our Services:</strong></p>

                                        <p><strong>6.1. You shall not</strong> upload, distribute, transmit, publish, share, display, or post any content through Our Services or through any service or facility, including any Communication Feature, provided by Us which:</p>

                                        <p>a. belongs to another person and to which You do not have any right;<br>
                                            b. is defamatory, obscene, pornographic, pedophilic, invasive of another's privacy, including bodily privacy, insulting or harassing on the basis of gender, libelous, racially or ethnically objectionable, relating or encouraging money laundering or gambling, or otherwise inconsistent with or contrary to the Applicable Laws;<br>
                                            c. is harmful to a child;<br>
                                            d. infringes any patent, trademark, copyright, or other proprietary rights;<br>
                                            e. deceives or misleads the addressee about the origin of the message or knowingly and intentionally communicates any information which is patently false or misleading in nature but may reasonably be perceived as a fact;<br>
                                            f. impersonates another person;<br>
                                            g. threatens the unity, integrity, defence, security, or sovereignty of India, friendly relations with foreign states, or public order, or causes incitement to the commission of any cognizable offence or prevents investigation of any offence or is insulting other nation;<br>
                                            h. contains a software virus or any other computer code, file, or program designed to interrupt, destroy, or limit the functionality of any computer resource;<br>
                                            i. is patently false and untrue, and is written or published in any form, with the intent to mislead or harass a person, entity, or agency for financial gain or to cause any injury to any person;<br>
                                            j. is otherwise objectionable or undesirable (whether or not unlawful);<br>
                                            k. is aimed at soliciting donations, chips, or other forms of help;<br>
                                            l. disparages the Company or any of its parent company, subsidiaries, affiliates, licensors, associates, partners, sponsors, products, services, or websites, in any manner;<br>
                                            m. promotes a competing service or product; or<br>
                                            n. violates any Applicable Law(s).</p>

                                        <p><strong>6.2. The Communication Feature</strong> for a User may be immediately suspended without any warning where We are of the opinion that such User is indulging in any activity prohibited under Clause 6.1. above, or elsewhere in the Platform Policies. This may also lead to suspension of the Account of such a User. You may report any abusive or malicious behavior by any other User to us by following the complaints procedure provided in Clause 16 below.</p>

                                        <p><strong>6.3. You shall not</strong> host, intercept, emulate, or redirect proprietary communication protocols, used by Us, if any, regardless of the method used, including protocol emulation, reverse engineering, or modification of Our Services or any files that are part of it.</p>

                                        <p><strong>6.4. You shall not</strong> frame Our Services, impose editorial comments, commercial material, or any information on Our Services, alter or modify any content, or remove, obliterate or obstruct any proprietary notices or labels.</p>

                                        <p><strong>6.5. You shall not</strong> use Our Services for commercial purposes, including but not limited to use in a cyber cafe as a computer gaming center, network play over the Internet, or through gaming networks, or connection to an unauthorized server that copies the gaming experience offered by Us.</p>

                                        <p><strong>6.6. You shall not</strong> purchase, sell, trade, rent, lease, license, grant a security interest in, or transfer Your Account, content, money, in-app currency, standings, rankings, ratings, or any other attributes appearing in, originating from, or associated with Our Services.</p>

                                        <p><strong>6.7. Any form of</strong> fraudulent activity, including attempting to use or using any other person's credit card(s), debit cards, net-banking usernames, passwords, authorization codes, prepaid cash cards, mobile phones for adding cash to the Deposit Segment, accessing or attempting to access the Services through someone else's Account, is strictly prohibited. Where We become aware of or are of the opinion, at Our sole discretion, that You are indulging in such fraudulent activity, We may terminate Your Account and notify the appropriate authorities, where relevant.</p>

                                        <p><strong>6.8. If You are</strong> an officer, director, employee, consultant, or agent of the Company, or a relative of such persons, You are not permitted to play either directly or indirectly, any Cash Games which entitle You to any prize, in the course of your engagement with the Company. For the purposes of these Terms, ‘relative' shall have the meaning ascribed to it in Section 2(77) of the Companies Act, 2013.</p>

                                        <p><strong>6.9. You undertake that You</strong> will not permit any other person to access or use Your Account and You will not use any form of external assistance to play the Games or indulge in any activity which violates the Platform Policies.</p>

                                        <p><strong>6.10. You are prohibited from</strong> utilizing Our Services for any restricted or unlawful purpose including, attempting to launder funds available in Your Account or deliberately losing money to a certain player(s).</p>

                                        <p><strong>6.11. You shall not</strong> send spam emails to any other user on the Platform, or any other form of unsolicited communication for any other purpose.</p>

                                        <p><strong>7. Deposit, Payment, Refund, and Cancellation:</strong></p>

                                        <p><strong>7.1. All payments</strong> on the Platform will have to be made through your Account on the Platform, by following the process indicated therein. Deposits made by You are credited to the Deposit Segment, and Your winnings are credited to the Withdrawable Segment. Your Account also provides a record of all transactions made by You on the Platform. You should routinely check the various segments of your Account to ensure that there has been no unauthorized use of your Account. If you suspect any unauthorized activity, you may contact the Grievance Officer at <a href="mailto:boomlly24x7@gmail.com">boomlly24x7@gmail.com</a></p>

                                        <p><strong>7.2. All transactions You make</strong> with Us shall be in Indian Rupees (INR). You are free to deposit funds in the Deposit Segment for the purpose of participating in Cash Games, subject to the following conditions:</p>

                                        <p>a. You can only deposit up to INR 50,000 (Indian Rupees Fifty Thousand only) to the Deposit Segment in a single transaction; and<br>
                                            b. the monthly deposit limit set by Us with undertakings, indemnity, waiver, and verification conditions as We deem appropriate in Our sole discretion. We will notify You of any changes in the deposit limits on the Platform.</p>

                                        <p><strong>7.3. The deposits made</strong> by You in the Deposit Segment are purely for the purpose of enabling Your participation in the Cash Games and do not carry or generate any interest or return.</p>

                                        <p><strong>7.4. You cannot transfer</strong> any funds from Your Account to the Account of another user, except as may be permitted by the Company.</p>

                                        <p><strong>7.5. You hereby represent</strong> and warrant that the payment instrument/mode used for adding cash to Your Account, belongs to You.</p>

                                        <p><strong>7.6. Credit cards, debit cards, prepaid</strong> cash cards, and internet banking payments are processed through third-party payment gateways. Similarly, other payment modes also require authorization by the entity which processes such payments. You understand and agree that We are not responsible for delays or denials in processing payments at such third party's end. The processing of payments will be solely in terms of the applicable policies and procedures of the relevant third parties, without any responsibility or risk at Our end.</p>

                                        <p><strong>7.7. If there are any</strong> issues in connection with adding cash/depositing funds on the Platform, You may send a complaint to Us by following the complaints procedure provided in Clause 16 below.</p>

                                        <p><strong>7.8. Once a payment/transaction is</strong> authorized and confirmed, and the funds are received by Us, the amount is credited to the Deposit Segment and is available for You to play Cash Games. You understand and agree that we are not liable in the event of Your credit being delayed or eventually declined, and You are required to follow up with the providers of the payment instrument You used to initiate the transaction.</p>

                                        <p><strong>7.9. We have the right</strong> to cancel a transaction at any time and at Our sole discretion, and if the relevant payment is successfully realized in such an event, the transaction will be reversed, and the money credited back to the original source of payment.</p>

                                        <p><strong>7.10. Where any of</strong> the fixtures within a Game are canceled or abandoned without an official result, all game entries are considered void and the Contribution shall be duly refunded to User. There are no prize/winnings pay-outs and platform fee charges for these voided Games.</p>

                                        <p><strong>7.11. By participating in</strong> Cash Games You hereby authorize the Company to appoint a third party/ Trustee/Escrow Agent to manage funds deposited by You on your behalf. Subject to these Terms and Conditions, amounts collected from You are held in a separate non-interest earning bank account. The said accounts are operated by a third party appointed by the Company. From these bank accounts, the payouts can be made to (a) the users (towards their withdrawals), (b) Company (towards its Service Fee) and (c) to governmental authorities (towards TDS on winnings).</p>

                                        <p><strong>7.12. You may Withdraw all</strong> or any part of the Withdrawable Balance to Your Bank Account, which will be processed by means of an electronic bank-to-bank transfer or such other mode as per your stated preferences and in accordance with Applicable Law.</p>

                                        <p><strong>7.13. At the time of initiating</strong> a Withdrawal Request, You are required to provide Us with the details of the Bank Account to which the funds are to be credited, and such Bank Account must belong to You.</p>

                                        <p><strong>7.14. A Withdrawal Request will</strong> be accepted by Us subject to adequate KYC verifications, alignment with the deposit method, Discount terms/restrictions, and/or security reviews by Our automated systems and risk management team. You agree that all Withdrawals You make are governed by the following conditions:</p>

                                        <p>a. You can Withdraw all or any part of Your Withdrawable Balance, subject to the levy of applicable processing fee (depending on the Withdrawal method), and applicable taxes.<br>
                                            vb. You may Withdraw a minimum of INR 50.00 (Indian Rupees Fifty only) and a maximum of INR 50,0000.00 (Indian Rupees Fifty lakh ) per transaction. When Withdrawing funds, payment will be made to You either by electronic wire transfer, or any other manner in accordance with Your stated preferences and Applicable Law. We also reserve the right to disburse the amount to the financial instrument/mode used to add cash to Your Deposit Segment. The foregoing limits on withdrawal may be changed or modified by Us from time to time.<br>
                                            c. Withdrawal Requests shall, subject to Withdrawal restrictions specified in these Terms and the Platform, be processed post Your KYC verification. We may ask You for Your KYC documents at any stage to verify Your address and identity.<br>
                                            d. Discount and promotional winnings are not directly Withdrawable and are subject to the terms and conditions applicable to their grant.</p>

                                        <p><strong>7.15. We will attempt</strong> to process Your Withdrawal Request in a timely manner, but there may be delays due to the time required for the KYC verification, security checks, and other processes involved in completing the Withdrawal transaction. We shall not be liable to pay any form of compensation to You for the reason of such delays in processing Withdrawal Requests and remitting payments.</p>

                                        <p><strong>7.16. You may request</strong> a Refund in the following instances:<br>
                                            a. where a Cash Game is canceled on account of a technical issue or Service defect solely attributable to the Company;<br>
                                            b. where You discover a violation of the Platform Policies. Please note that in such a case, a Refund will be issued only when the Company risk management team, upon due investigation, discovers a violation of the Platform Policies by the players of a particular Cash Game that unduly prejudiced the user entitled to the Refund; or<br>
                                            c. any other reason as may be determined by the Company in its sole discretion, from time to time</p>

                                        <p><strong>7.17. Upon receipt of</strong> a Refund request from You, Your Refund request will be verified and where accepted, the Refund will be processed within two (2) weeks from the date of receipt of such Refund request and the requisite Refund amount will be added to Your Account.</p>

                                        <p><strong>7.18. When You request</strong> for cancellation of any ‘add cash' transaction on Our Platform, we may process such cancellation request within two (2) weeks, subject to the cancellation request being made within two (2) hours of the ‘add cash' transaction, additional checks and verifications being conducted where necessary, and there being no utilization of the added funds in the interim. Upon successful cancellation, the fund shall be credited to the original source used to add such funds.</p>

                                        <p><strong>7.19. Your winnings may</strong> be disclosed to the relevant authorities, and requisite amounts may be withheld from payouts, in order to ensure compliance with Applicable Law(s) and lawful requests from the government, regulatory bodies, or an order of any court of competent jurisdiction. It is solely Your responsibility to ensure due remittance of all the applicable taxes.</p>

                                        <p><strong>8. KYC Verification:</strong></p>

                                        <p><strong>8.1. We require users to undergo an additional online document verification (“KYC”) in the following scenarios:</strong></p>
                                        <p>a. where You place a Withdrawal Request of an amount exceeding the applicable limit or exceed the number of Withdrawal Request as specified on the Platform;<br>
                                            b. where We suspect or have been notified that You have violated any of the Platform Policies; where You have been identified to be in breach of the applicable add cash thresholds;<br>
                                            c. as may be required under Applicable Law(s); or<br>
                                            d. as may be determined by the Company in its sole discretion from time to time.</p>

                                        <p><strong>8.2. As part of the KYC process, our automated system enables a mandatory process for Users to upload documents pertaining to their Permanent Account Number (PAN) and Bank Account details.</strong></p>

                                        <p><strong>8.3. The KYC documents must be uploaded on the Platform, and We do not accept submissions in any other form or manner.</strong></p>

                                        <p><strong>8.4. At the time of uploading the document on Our Platform, You must ensure the following:</strong></p>
                                        <p>a. documents are valid;<br>
                                            b. the document is clear and legible, and shared in a jpg, jpeg, or pdf format; and<br>
                                            c. documents are not password protected.</p>

                                        <p><strong>8.5. The validation of KYC documents may take up to three (3) working days from the date of submission of the documents. We reserve the right to validate and/or reject the KYC documents at our sole discretion. You will be notified of the status of KYC verification on Your registered mobile number/email address and on the Platform.</strong></p>

                                        <p><strong>9. Discount and Prize:</strong></p>

                                        <p><strong>9.1. To be eligible for Discounts or to win a prize on the Platform, a User must not access the Services from any of the Barred States.</strong></p>
                                        <p>If You are not a citizen of India and are accessing the Services from within a permitted location in India, You will be able to use Our Services and win prizes or be eligible to receive Discounts, and We will process Your Withdrawal Requests in INR to any Indian Bank Account in Your name (subject to KYC verification).</p>

                                        <p><strong>9.2. When You add cash to the Deposit Segment, You may be allotted certain Discounts depending on the existence of ongoing promotional offers. Such Discounts may be dependent on certain conditions, such as Your continued usage of Our Services or participation in Cash Games, and accordingly, a part of the Discounts may be released before or at the time of gameplay settlement. An amount net of such Discounts will be considered to have been collected from You in cash for the purpose of buy-in (including Service Fee).</strong></p>

                                        <p>9.3. You agree that where the Platform decides to provide Rakeback to Your Deposit Segment, such amount of Rakeback shall be adjusted first against the Service Fee collected from You and subsequently against the prize pool.</p>

                                        <p>9.4. You agree that in case the amount of Rakeback credited to Your Deposit Segment is determined on the basis the total Service Fee collected from You in the prior and active gameplays, such amount of Rakeback shall be adjusted first against the Service Fee collected from You and subsequently against the prize pool.</p>

                                        <p>9.5. At its discretion, the Platform, basis the applicable promotional scheme may credit GameCash to the User at the time of settlement of a prior gameplay. You agree that such amount of GameCash shall not be eligible to be adjusted against the Service Fee collected from You in the prior Gameplay. Such GameCash may be released in a subsequent gameplay, subject to a release rate or applicable promotional scheme, and in such case, You agree that the GameCash released shall be adjusted against the Service Fee collected in the said Gameplay.</p>

                                        <p>9.6. You agree that any Discounts offered by the Company on the Platform would be first adjusted against the Service Fee and subsequently against prize pool.</p>

                                        <p><strong>9.7. In the event, Your Account is terminated by You voluntarily, or by Us in accordance with these Terms, all GameCash issued to You shall be forfeited and You shall have no further right or interest in such GameCash.</strong></p>

                                        <p><strong>9.8. Any violation of the Platform Policies at any stage may result in disqualification from receiving the Discounts or promotional winnings.</strong></p>

                                        <p><strong>9.9. You may win prizes while playing Games on the Platform. Such prizes are subject to the specific terms and conditions communicated at the time of issuance of the prize.</strong></p>

                                        <p><strong>10. Service Fees and Taxes:</strong></p>

                                        <p><strong>10.1. The Company charges a Service Fee on each Cash Game played on the Platform by a User, which may vary depending on the nature of the Cash Game and is subject to change from time to time, as indicated in Clause 10.2 below. The Company reserves the right to levy different Service Fees for different Cash Games at its sole discretion.</strong></p>

                                        <p><strong>10.2. Users who fulfill certain specific criteria may, at the sole discretion of the Company, adjust the Discounts received against the Service Fee charged for a particular Game or a set of Games in line with the market conditions, business practices and trade parlance, even after the conclusion of the Game(s). Accordingly, such post-facto Discounts by the Company will reduce and reverse a part of the Service Fee applicable to a Game.</strong></p>

                                        <p><strong>10.3. Discounts may be granted to users based on a number of parameters pertaining to usage of the Platform by the user, including the frequency of Games played, participation in tournaments or special Game types, overall winnings, conduct on the Platform, players referred to the Platform, etc.</strong></p>

                                        <p><strong>10.4. It is clarified that all forms of Discounts and other GameCash, promotional winnings and rebates offered by the Company to a user shall be first applied to the Service Fee chargeable to such User, and the Company has the right to reduce and vary Discounts and promotions accordingly. Further, such Discounts and promotions may be subject to specific conditions, such as usage only in specific types of Games, or restricted usage only after the expiry of a predetermined time period, etc.</strong></p>

                                        <p><strong>10.5. Details pertaining to each Game transaction, including the applicable Service Fee for that Game, will be accessible by You on an information panel made available to You before You initiate a Cash Game. The Service Fee charged shall be inclusive of the Goods and Services Taxes, at the rates mandated under Applicable Law(s). Variations to Service Fees in the manner set out in this Clause 10, may impact the overall transaction details of a Cash Game, including the taxes applicable thereon, and hence You are advised to periodically check the information panel. If You require any further information on any aspect of the Service Fee, including the tax components thereof, You may write to us at <a href="mailto:boomlly24x7@gmail.com">boomlly24x7@gmail.com</a>.</strong></p>

                                        <p><strong>10.6. TDS at the rate prescribed under applicable laws shall be levied on all the Net Winnings</strong> (i.e., the difference between Total Withdrawals in a financial year and Total Deposits in the same financial year. Financial year is counted from 1 April to 31st March of a particular year). TDS at the rate of thirty (30) per cent shall be levied on Net Winnings at the time of Withdrawal and at the end of a Financial Year on the remaining balance of your Net Winnings. Please refer to the TDS policy here for more details. The TDS policy, limits and rates are subject to

                                        <p><strong>10.7. Tax invoice and credit note:</strong> In case a User wishes to obtain his copy of tax invoice and/or credit note containing the prescribed particulars as per Goods and Services Tax Act and the rules provided thereunder, in respect of a particular gameplay, such tax invoice / credit note shall be provided to the said User on receipt of a specific request raised with us.</p>

                                        <p><strong>11. Termination, Suspension, and Opt-out:</strong></p>

                                        <p><strong>11.1.</strong> We may change, suspend or discontinue any aspect of the Platform at any time, including the availability of any Platform's feature, Services, database, or Content. We may also impose limits on certain features and Services or restrict your access to parts or the Platform, without notice or liability at any time in our exclusive discretion, without prejudice to any legal or equitable remedies available to us, for any reason or purpose. However, under normal circumstances, we will only do so where there has been conduct that we believe violates these Terms or other rules and regulations or guidelines posted on the Platform or conduct which we believe is harmful to other Users, to our businesses, or other information providers.</p>

                                        <p><strong>11.2.</strong> If You do not log in to Your Account at least once in a twelve (12) month period, Your Account shall be considered inactive and a maintenance fee of INR 250 per year may be chargeable against any funds remaining therein (“Inactive Account Fee”).</p>

                                        <p><strong>11.3.</strong> We reserve the right to suspend or terminate Your Account if We find that You are violating any of our Platform Policies, or breaching/attempting to breach the security of Our Services in any manner, Your Account may be terminated immediately and any prize, GameCash, promotional winnings, or funds therein may be forfeited.</p>

                                        <p><strong>11.4.</strong> In the event Your Account is terminated by Us in accordance with Clause 11.3, You will:
                                            <strong>a.</strong> not be permitted to use Our Services, thereafter, from the mobile number, PAN, and Bank Account linked to the terminated Account; and
                                            <strong>b.</strong> be permitted to Withdraw the Withdrawable Balance, subject to applicable restrictions in the Platform Policies.
                                        </p>

                                        <p><strong>11.5.</strong> Further, if We find that a user is breaching/attempting to breach Our security or privacy protocols, We may, following an internal investigation, decide to undertake a range of remedial actions, depending upon the severity of the detected breach, which may include the following:
                                            <strong>a.</strong> stop access and usage of Our Services, indefinitely, by such user;
                                            <strong>b.</strong> permanently terminate such User's Account;
                                            <strong>c.</strong> restrict Withdrawals for such User;
                                            <strong>d.</strong> demand compensation for the damages to Our Services that occurred because of the breach and prosecute a user for any violation of the law and the Platform Policies if need be; and
                                            <strong>e.</strong> prohibit the user from registering with Us in the future.
                                        </p>

                                        <p><strong>11.6.</strong> In the event, We believe or suspect that You have been engaged in Fair Play Violation:
                                            <strong>a.</strong> we will notify You such breach/attempt to breach; and
                                            <strong>b.</strong> We shall have the right to investigate and monitor Your Account and Your gameplay for such period of time as in Our reasonable opinion may be needed to investigate such breach. The balance funds of Users guilty of Fair Play Violations will be frozen for a period of one hundred and eighty (180) days. Such investigation will cover all the games that the concerned User has played since the time of registering on the Platform.
                                            <strong>c.</strong> In the event, We, upon investigation are of the view that Your Account is or has been engaged in Fair Play Violations, then to the extent of the amount which is involved in such Fair Play Violations, We may:
                                            <strong>a.</strong> forfeit the fund in Your Account;
                                            <strong>b.</strong> repatriate the amount to the User or individuals who have been affected by the Fair Play Violation; and
                                            <strong>c.</strong> levy a Fair Play violation fee of an amount up to an amount of INR 10,000 per instance of such Fair Play Violation. You agree that such fee is not in the form of a penalty but is a reasonable and justifiable cost, manpower, technology, loss of reputation that We as a Platform may suffer due to Your violation of the Fair Play Policy. The fair play violation fee may be debited from the funds in Your Account or in the event the balance in Your Account is not sufficient to cover the fee, we may raise a claim for such fee against You in accordance with Applicable Laws.
                                            For the purpose of these Terms, <strong>“Fair Play Violation”</strong> means any activity of a User that violates the Platform Policies and includes without limitation:
                                            <strong>a.</strong> activity that uses unfair means to manipulate the outcome of a game on the Platform, irrespective of whether this in favour of the user adopting such means;
                                            <strong>b.</strong> activity that is fraudulent, illegal, or unfair activity, as determined by the Company in its sole discretion;
                                            <strong>c.</strong> activity that is intended solely to transfer funds from one person to another person, or between distinct sources, thereby amounting to money transferring;
                                            <strong>d.</strong> activity that involves collusion between two or more players to achieve a result during a game, thereby amounting to syndicate playing; and
                                            <strong>e.</strong> such other activities may be determined by the Company, from time to time.
                                        </p>

                                        <p><strong>11.7.</strong> If We have been instructed or made aware of a cyber fraud or any other fraudulent activity related to a User's Account by a governmental, police or any law enforcement authority or agency, then We reserve the right to (a) suspend Your Account; and (b) transfer any funds lying in Your Account to such Bank Account as may be instructed by the governmental, police or any law enforcement authority or agency. We also reserve the right to block any and all Withdrawals from Your Account upon instructions from the governmental, police or any law enforcement authority or agency.</p>

                                        <p><strong>11.8.</strong> We may attempt to validate Your Account via call or email. In the event that We are not able to get in touch with You on the first occasion, We will make subsequent attempts to establish contact with You. In cases where the phone number and email address provided by You is incorrect, We bear no responsibility for Your access and use of the Services being interrupted. In case We are unable to reach You or if the validation is unsuccessful, We reserve the right to disallow You from logging onto Our Services or reducing Your play limits and/or add cash limits till such time We are able to satisfactorily validate Your Account. In such an event, We will notify You via push notifications or SMS of the next steps regarding Your Account validation. We may also ask You for proof of identification and proof of address from time to time. Where Your access to Your Account is limited or access to Our Services is restricted as a result of unsuccessful Account validation, We may take seven (7) working days to reinstate complete access to Your Account and Our Services upon successful validation. In the event that We have made several unsuccessful attempts to reach out to You, We reserve the right to terminate Your Account and refund Withdrawable Balance, if any. We will not be liable for any claim, damage or loss accruing to You from such termination or restriction.</p>

                                        <p><strong>11.9.</strong> You are free to discontinue using Our Services at any time by sending Us an email indicating such intention at <a href="mailto:boomlly24x7@gmail.com">boomlly24x7@gmail.com</a> (“Discontinuation Request”). If at such time, there is a positive Withdrawable Balance and/or funds in Your Deposit Segment, We will disburse the same to You by electronic transfer in accordance with these Terms, subject to any applicable charges, including an account closure fee of INR 1,000.00 (Indian Rupees One Thousand Only) or ten (10) percent of the total funds to be transferred, whichever is higher.</p>

                                        <p><strong>12. Your Representations and Warranties:</strong></p>

                                        <p><strong>12.1. You represent that:</strong></p>

                                        <p>(a) You are of eighteen (18) years of age and are eligible and competent to enter into transactions with other users and the Company.</p>
                                        <p>(b) Any information You provide to Us at any time during the access and use of Our Services, whether at the stage of registration or any time thereafter is correct, complete, up-to-date, and accurate. We shall not be liable against any claim relating to the accuracy, completeness, and correctness of any information You provide Us. We may, at any time and at Our sole discretion, require You to verify the correctness, completeness, and accuracy of such information, and to that extent require You to produce additional documentary proof. Where You fail to provide Us with valid documentary proof, We reserve the right to limit Your access and use of Our Services.</p>
                                        <p>(c) You will protect the information You provide Us, including the one-time password (OTP) shared with you when you log in to the Platform to avail of Our Services. We will never require You to enter or disclose the OTP, except at the time of logging on to Our Services. You must never share Your Account login information with anyone, including any other User of the Platform or any representative of the Company. You specifically understand and agree that We will not incur any liability for information provided by You to anyone which may result in Your Account being exposed or misused by any other person.</p>
                                        <p>(d) You have the required legal rights in relation to any content that You may transmit, upload, or otherwise make available on the Platform, and such action of Yours shall not violate the intellectual property rights of a third party.</p>
                                        <p>(e) You shall use Your Account solely for the purpose of playing the Games offered through Our Services, and not to launder funds or commit any other unlawful or prohibited activity.</p>
                                        <p>(f) Prior to adding cash to the Deposit Segment or participating in Cash Games, You shall be responsible to satisfy Yourself about the legality of playing Cash Games in the jurisdiction from where You are accessing Cash Games.</p>
                                        <p>(g) You have the experience and the requisite skills required to play Games on the Platform, and that You are not aware of any physical or mental condition that would impair Your capability to fully participate in such activity.</p>
                                        <p>(h) You are aware that playing Cash Games may result in financial loss to You. With full knowledge of the facts and circumstances surrounding this activity, by using the Platform, You are voluntarily choosing to play Games and accordingly assume all responsibility for and risk resulting from Your participation in any Cash Game or other activity on the Platform, including any financial loss. You understand that the Company shall not be liable for any financial loss that You may sustain as a result of your use of the Platform. You agree to indemnify and hold the Company, its employees, directors, officers, and agents harmless with respect to any and all claims and costs associated with Your use of the Platform.</p>
                                        <p>(i) You understand and accept that Your participation in a Game does not create any obligation on Us to give You a prize. Your winning a prize is entirely dependent on the outcome of the Game, and Your skill as a player vis-à-vis other players in the Game and is further subject to the Platform Policies.</p>
                                        <p>(j) The Company is not responsible for Your inability to access or play any Game or event in which You may be eligible to participate, irrespective of the cause of such event. This includes situations where You are unable to log into Your Account or the same may be pending validation or You may be in suspected or established violation of any of the Platform Policies.</p>

                                        <p><strong>13. Content and Advertisements:</strong></p>

                                        <p><strong>13.1. You are solely responsible for any content that You transmit, upload, or otherwise make available on Our Services. By publishing any content on Our Platform, You agree to grant Us a royalty-free, worldwide, non-exclusive, perpetual, and assignable right to use, copy, reproduce, modify, adapt, publish, edit, translate, create derivative works from, transmit, distribute, and publicly display Your content, and to use such content in any related marketing materials produced by Us or Our affiliates. Such content may include, without limitation, Your name, username, profile picture and other information provided on the Platform.</strong></p>

                                        <p><strong>13.2. By accessing or using or availing any part of Our Services, including the Communication Feature, You may be exposed to content posted by other users, over which the Company has no control. If You find any aspect of such content offensive or unlawful, You may bring such content to Our notice, and We shall take appropriate remedial actions in accordance with Applicable Law(s).</strong></p>

                                        <p><strong>13.3. We may place certain promoted or sponsored content on Our Platform (directly or via links to other sites or resources) in conjunction with third parties. We make no warranties with respect to such content and neither do we endorse any information contained therein. We shall not be liable to You for such promoted or sponsored content, and Your interaction with such content or third-party resources shall be solely at Your own risk.</strong></p>

                                        <p><strong>13.4. We may use any content in relation to the Games played on the Platform, including recordings of the gameplay, for Our corporate and marketing purposes, and accordingly, You acknowledge, agree, and consent to our right in this regard.</strong></p>

                                        <p><strong>14. Disclaimer, Indemnity, and Limitation of Liability:</strong></p>

                                        <p><strong>14.1. The Company is not liable for any claim, loss, injury, damages, expenses, or lost profits or earnings, incurred by You in connection with Your use of the Platform and the Services.</strong></p>

                                        <p><strong>14.2. Notwithstanding anything to the contrary contained in the Terms, You agree that Our maximum aggregate liability for all Your Claims against Us, in all circumstances other than for a valid Withdrawal, is limited to the Service Fee less GameCash and other promotional amounts, paid to Us over the preceding three (3) months.</strong></p>

                                        <p><strong>14.3. You are solely responsible for any consequence resulting from Your use of the Platform, and You understand that We assume no liability or responsibility for any financial loss that You may sustain in this regard.</strong></p>

                                        <p><strong>14.4. You agree to indemnify and hold harmless the Company, its employees, directors, officers, and agents against any claims, actions, suits, damages, penalties, or awards brought against Us by any entity or individual in connection with or in respect of (a) breach of these Terms, in tort (including negligence) third party claims or liabilities arising against Company out of such a breach, based in contract, tort, statute, fraud, misrepresentation, or any other legal theory, and regardless of whether a claim arises during or after the termination of these Terms; (b) your use of the Platform in any matter that is contrary to Applicable Laws, with an intent to deceive, defraud cheat, mislead or solicit any business, monetary or non-monetary consideration or information from another User; (c) your breach of any Applicable Laws; (d) your use of the Platform, including but not limited to your posting, use of, modification or interaction with any content on the Platform; (e) any unauthorized, improper, illegal or wrongful use of your Account by any person, including a third party, whether or not authorized or permitted by you; (f) your User Content; (g) use by any other person accessing the Platform using your username or OTP, whether or not with your authorization, (h) the use by us of information provided by you through our Platform; (i) from any income tax demand raised (including and not limited to tax, interest, penalty, withholding tax or any other amount payable under the Indian Income-tax Act, 1961) arising on account of your misrepresentation and/ or your non-compliance of the terms and conditions mentioned therein. You agree that any income tax demand (including and not limited to tax, interest, penalty, withholding tax or any other amount payable under the Indian Income-tax Act, 1961) which is paid/ payable by us in this regard, will be recovered by us and debited from your Account.</strong></p>

                                        <p><strong>14.5. The Platform is offered by the Company on an as-is basis and to the fullest extent permitted by law, the Company makes no implied warranties, with respect to the Service. All implied warranties of merchantability and fitness for a particular purpose or use, are disclaimed. No one is authorized to make any warranty on Our behalf, and users may not rely on any other statement of warranty. However, where we receive adequate notice of an error in Our Services, We shall take prompt steps to rectify the same.</strong></p>

                                        <p><strong>14.6. To the maximum extent permissible by law, the Company expressly disclaims all responsibility and liability for any harm, damages, or loss resulting from Your participation in, or cancellation of, any Game, any activity or transactions with third parties whom You may have connected to through Our Services, and any user-generated content, including any violation of intellectual property rights with respect to such user-generated content.</strong></p>

                                        <p><strong>14.7. A failure by Us, to insist upon strict performance of any of the provisions herein or to exercise any option, right or remedy contained herein, shall not be construed as waiver or relinquishment of such provisions, option, right or remedy. No waiver of any provision hereof shall be deemed to have been made unless expressed in writing and signed.</strong></p>

                                        <p><strong>14.8. In case of any technical failures, server crashes, breakdowns, software defects, disruption or malfunction of service at our end, as a policy, we will cancel the Game(s) and refund the participation amounts after proper verification and no Service Fee will be charged for such Games and you accept that we are not responsible to you in all such cases. For any game, we have the right to cancel and refund the participation amount. In no case, other than a server crash, are we accountable for any of the User's disconnections from the server. We are also not liable for any prospective Winnings from any incomplete game.</strong></p>

                                        <p><strong>14.9. We are not liable for any disconnection, lag, freeze or interference in the network on the User's computer or any other external networks.</strong></p>

                                        <p><strong>14.10. The latest versions of the Platform Policies, as published on the Platform, contain the entire agreement between You and Us regarding the access to and use of Our Services and supersedes all prior agreements, including prior versions of the Platform Policies. You understand and acknowledge that once a game has commenced, not being able to play due to slow internet connections, faulty hardware, technical failure due to customer's hardware, internet connection failure, low computer configuration or for any other reason not attributable to us does not require us to issue a refund of the participation amount you may have paid for participation.</strong></p>

                                        <p><strong>15. Intellectual Property Rights:</strong></p>

                                        <p><strong>15.1. The Company and/or its affiliates (as the case may be) exclusively owns all rights and intellectual property of any type throughout the world, including but not limited to patents, trademarks, domain names, trade names, service marks, copyrights, software, trade secrets, industrial designs, and know-how in the Platform and Services, and the underlying technology and documentation therein (“Company Intellectual Property”).</strong></p>

                                        <p><strong>15.2. Upon validly registering on the Platform, You are granted a limited right to use Our Services in accordance with the Platform Policies, and You have no right, ownership, title, or interest in the Company Intellectual Property.</strong></p>

                                        <p><strong>16. Complaints and Disputes:</strong></p>

                                        <p><strong>16.1. If You have any complaint or grievance relating to any aspect of the Services, You may approach Our customer care and grievance redressal team for the resolution of such issues by writing to boomlly24x7@gmail.com.</strong></p>

                                        <p><strong>16.2. You agree that all complaints and disputes at the Company are to be kept confidential. We will endeavour to resolve all grievances within a reasonable period, as mandated under Applicable Law. Any decision taken by Us relating to any complaint will be binding on the user.</strong></p>

                                        <p><strong>16.3. The following are the details of Our grievance officer: Name: sunil kumar beniwal Designation: Grievance Officer Email address: sunilbeniwalofficial@gmail.com</strong></p>

                                        <p><strong>17. Governing Law, Dispute Resolution, and Jurisdiction:</strong></p>

                                        <p><strong>17.1. The Platform Policies are governed by and shall be interpreted in accordance with the laws of India.</strong></p>

                                        <p><strong>17.2. Subject to Clause 17.3, any dispute, controversy, or claim against the Us or arising out of these Platform Policies shall be subject to the exclusive jurisdiction of the civil courts at Bengaluru, Karnataka.</strong></p>

                                        <p>
                                            <strong>17.3.</strong> In the event of any legal dispute arising in relation to any aspect of the Platform Policies, or the use of our Services by You, You must provide written notification to Us of the dispute and relevant details. We shall attempt to resolve the dispute through discussions with You, and where such resolution fails to be concluded within thirty (30) days, the dispute may be referred to arbitration. The arbitration shall be conducted before a tribunal of three (3) arbitrators wherein both the Company and You shall be entitled to appoint one (1) arbitrator each and the two (2) arbitrators shall jointly appoint the third arbitrator. The place of arbitration shall be Bangalore, Karnataka, and the arbitration proceedings shall be conducted, in English, in accordance with the provisions of the Arbitration and Conciliation Act, 1996. The award arising from such arbitration proceedings will be final and binding on the parties, and each party will bear its own costs of arbitration and equally share the fees of the arbitrator unless the arbitral tribunal decides otherwise.
                                        </p>

                                        <p>
                                            <strong>17.4.</strong> Notwithstanding anything in Clause 17.3, the Company shall be entitled to seek and obtain from a court of competent jurisdiction, an interim or permanent equitable or injunctive relief, or any other relief available under Applicable Law(s), to safeguard its interest, at any time during the pendency of a dispute with You or any other person, and such pursuit of relief shall not constitute a waiver of the arbitration process mandated herein.
                                        </p>

                                        <p>
                                            <strong>18. Privacy</strong>
                                        </p>

                                        <p>
                                            <strong>18.1.</strong> By using the Platform and providing any of your personal information to the Platform, You affirmatively consent and agree to comply with our Privacy Policy, guidelines and statements as may be applicable from time to time, which are incorporated into and forms an integral part of these Terms. If you do not agree to the terms of the Privacy Policy in its entirety or have objections to the use of your information, you may not access or otherwise use the Platform or its Services.
                                        </p>

                                        <p>
                                            <strong>19. Responsible Gaming</strong>
                                        </p>

                                        <p>
                                            The Company is concerned about Your health and well-being, and we constantly take measures to improve the well-being of our users. You are advised to follow Our Responsible Gaming Policy to maximize Your health and safety while engaging in online gaming.
                                        </p>


                                    </div>
                                </div>
                            </article>
                            <!-- Post end-->
                        </center>


                        <!-- Page Navigation end-->
                    </div>
                </div>
            </div>
        </div>
        <!--blog section end-->



    </div>

    <!--footer section start-->
    <!--when you want to remove subscribe newsletter container then you should remove .footer-with-newsletter class-->
    <footer class="footer-1 gradient-bg ptb-60 footer-with-newsletter">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">About us</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">
                        {{ \Illuminate\Support\Str::limit($home->about_desc, 250, $end = '...') }}
                    </p>
                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <li><a href="{{ url('/') }}" class=""> Home</a></li>
                        <li><a href="#features" class="page-scroll">Features</a></li>
                        <li><a href="#screenshots" class="page-scroll">Screenshots</a></li>
                        <li><a href="#faq" class="page-scroll">Faq</a></li>
                        <li><a href="#process" class="page-scroll">Review</a></li>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>


                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                    <!--headin5_amrc-->
                    <ul class="footer_ul_amrc">
                        <li><a href="{{ url('/') }}/about-us">About Us</a></li>
                        <li><a href="{{ url('/') }}/privacy-policy">Privacy Policy</a></li>
                        <li><a href="{{ url('/') }}/terms-condition">Terms & Conditions</a></li>
                        <li><a href="{{ url('/') }}/refund-policy">Refund Policy</a></li>
                        <li><a href="{{ url('/') }}/contact-us">Contact</a></li>
                    </ul>
                    <!--footer_ul_amrc ends here-->
                </div>


                <div class=" col-sm-4 col-md  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Contact us</h5>
                    <!--headin5_amrc ends here-->

                    <ul class="footer_ul2_amrc">
                        <p><i class="las la-map-marked-alt icon-size-sm"></i> {{ $web->address }} </p>
                        <p><i class="las la-phone-volume icon-size-sm"></i> {{ $web->pnum }} </p>
                        <p><i class="las la-envelope icon-size-sm"></i> {{ $web->pemail }} </p>
                    </ul>
                    <!--footer_ul2_amrc ends here-->
                </div>
            </div>
        </div>


        <div class="container">
            <center>
                <div class="list-inline social-list-default background-color social-hover-2 mt-2">
                    <li class="list-inline-item"><a class="dribbble" href="https://www.instagram.com/boomlly.com_?igshid=OGQ5ZDc2ODk2ZA==" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a class="dribbble" href="https://whatsapp.com/channel/0029Va4ydTgAojYnH5E1VQ3U" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                </div>
                <!--foote_bottom_ul_amrc ends here-->
                <p class="text-center">{{ $web->copyright }}</p>
            </center>
            <!--social_footer_ul ends here-->
        </div>
        <!--end of container-->
        <!--end of container-->
    </footer>
    <!--footer section end-->
    <!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="{{ URL::asset('front-assets/js/vendors/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/popper.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/s/vendors/countdown.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/jquery.rcounterup.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/vendors/validator.min.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweet-alert.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/vendors/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('admin-assets/css/custom/js/screenshot/screenshot.js') }}"></script>
    <script src="{{ URL::asset('front-assets/js/app.js') }}"></script>
    <!--endbuild-->
</body>

</html>