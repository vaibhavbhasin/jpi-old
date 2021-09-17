{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Register')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div class="login-pattern"></div>
    <div id="register-page" class="row">
        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-1">
            <form class="login-form" id="registerform" method="POST" action="{{ route('employee.register') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="ml-4" id="top_heading">Register</h5>
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col m6 s12 padding_kl">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="firstname" type="text" class="@error('firstname') is-invalid @enderror"
                                       name="firstname" value="{{ old('firstname') }}"
                                       autocomplete="firstname">
                                <label for="firstname" class="center-align">Firstname</label>
                                @error('firstname')
                                <small class="red-text ml-7" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="input-field col m6 s12 padding_kl">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="lastname" type="text" class="@error('lastname') is-invalid @enderror"
                                       name="lastname" value="{{ old('lastname') }}"
                                       autocomplete="lastname">
                                <label for="lastname" class="center-align">Lastname</label>
                                @error('lastname')
                                <small class="red-text ml-7" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="col s12">
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">phone_outline</i>
                        <input id="phone_number" type="text" class="@error('phone_number') is-invalid @enderror"
                               value="{{ old('phone_number') }}" autocomplete="phone_number" name="phone_number">
                        <label for="phone_number">Phone Number</label>
                        @error('phone_number')
                        <small class="red-text ml-7" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">mail_outline</i>
                        <input id="email_save" type="hidden" name="email" value="{{ old('email') }}">
                        <input id="email" type="text" class="@error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               autocomplete="email">
                        <span class="button button-secondary emailaddress-hint">
                    @jpi.com
                </span>
                        <label for="email">Email</label>
                        @error('email')
                        <small class="red-text ml-7" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror"
                               name="password"
                               autocomplete="new-password">
                        <label for="password">Password</label>
                        @error('password')
                        <small class="red-text ml-7" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="col s12">
                        <div class="passw">
                            <h2 class="pass-checking-text"> Password Requirements: </h2>
                            <div class="pass-checklist">
                                <ul>
                                    <li id="character_length" class="ccross">Must contain at least 8 characters (12+
                                        recommended )
                                    </li>
                                    <li id="uppercase_latter" class="ccross">Must contain at least one uppercase
                                        letter
                                    </li>
                                    <li id="lowercase_latter" class="ccross">Must contain at least one lowercase
                                        letter
                                    </li>
                                    <li id="one_number" class="ccross">Must contain at least one number</li>
                                    <li id="special_character" class="ccross">Must contain at least one special
                                        character
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin employee_details_row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password-confirm" type="password" name="password_confirmation"
                               autocomplete="new-password">
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                </div>

                <div class="row margin" id="terms_row" style="display: none">
                    <div class="input-field col s12">
                        <div class="terms_and_condition" id="terms">
                            <p><strong>Privacy Policy</strong></p>
                            <p>Updated as of: 8/31/2021</p>
                            <p>JPI and the advised funds which it manages (collectively &ldquo;we,&rdquo; &ldquo;us,&rdquo;
                                or
                                &ldquo;our&rdquo;) are committed to keeping the personal data collected from employees,
                                potential, current and former investors, clients, and other individuals confidential and
                                secure.
                                The proper handling of such personal data is a high priority. Please read this policy
                                carefully
                                to understand how we collect, use, share, and protect your personal data. In this
                                policy,
                                &ldquo;you&rdquo; and &ldquo;your&rdquo; refers to the individual to whom such personal
                                data
                                relates.</p>
                            <p><strong>Data We Collect</strong></p>
                            <p>&ldquo;Personal Information&rdquo; is information that identifies, relates to, describes,
                                is
                                capable of being associated with, or could reasonably be linked, directly or indirectly,
                                with
                                you or your household, such as your name, email address, IP address, telephone number,
                                and
                                broader categories of information such as your professional, educational or health
                                information,
                                commercial information and internet activity.</p>
                            <p>We collect Personal Information through the Site.&nbsp; When you make a payment through
                                the
                                residential portal, we collect information about your payment history and payment
                                information.&nbsp;
                                Although we use a third-party payment processor to facilitate any payments made on our
                                Site
                                through the residential portal, we retain this information for accounting purposes and
                                to
                                respond to inquiries, communicate with you about your account, and for other business
                                purposes.&nbsp;
                                We may collect Personal Information directly from you and automatically through our use
                                of
                                cookies and other data collection technologies on our Sites. We may also collect your
                                Personal
                                Information from third-party sources, such as social media platforms (if you interact
                                with us
                                through your social media account), background check providers, credit bureaus, and
                                third
                                parties to whom you direct us to collect your Personal information.&nbsp; We will treat
                                Personal
                                Information collected from third-party sources in accordance with this Privacy Policy
                                but we are
                                not responsible or liable for the accuracy of the information provided by third parties
                                or for
                                the third-party policies or practices.</p>
                            <p>The categories of Personal Information that we collect from you depend on your
                                interactions and
                                engagement with us. For example, we collect:</p>
                            <ul>
                                <li>Direct Identifiers, such as your name, address, date of birth, social security
                                    number,
                                    drivers&rsquo; license number and information, gender, age, IP address, online
                                    identifiers,
                                    email address, phone number, payment card or financial account numbers and related
                                    information required to process payments, and other similar identifiers. We collect
                                    this
                                    information to verify your identity and information, screening potential residents,
                                    collections activity, communicate with you, process your payments, and provide you
                                    with
                                    access to your resident portal account.
                                </li>
                                <li>Commercial Information, such as the property, leases and services purchased from us,
                                    real
                                    property purchased, rented or leased from others, insurance information, and number
                                    of
                                    occupants. We collect this information to maintain client records, identify trends
                                    in our
                                    client relationships, processing insurance claims, screening potential residents,
                                    collections activity, and conduct business analytics.
                                </li>
                                <li>Internet Activity Information, such as your browsing history, search history,
                                    cookies,
                                    browser and device type, and information regarding your interactions with pages you
                                    visit on
                                    the Sites. We collect this information to understand your use of the Sites and your
                                    Account
                                    and for targeted marketing and lead management.
                                </li>
                                <li>Professional and Employment-Related Information, such as information about your
                                    current
                                    employment, salary, professional degrees and certifications, and education
                                    background. We
                                    collect this information to verify your identity, perform background and regulatory
                                    compliance checks, and other related processes.
                                </li>
                                <li>Profile Information, such as information about your preferences and characteristics.
                                    We
                                    collect this information in order to understand your preferences and tailor our
                                    services and
                                    communications to you.
                                </li>
                            </ul>
                            <p>We intend to implement this Privacy Policy in a manner consistent with applicable
                                employment
                                laws. To the extent that such applicable employment laws are in conflict with this
                                Privacy
                                Policy, we will act in accordance with such applicable employment laws.</p>
                            <p><strong>Who this Affects</strong></p>
                            <p>If you are a natural person, this will affect you directly. If you are a corporate
                                investor or
                                client (including, for these purposes, legal arrangements such as trusts or exempted
                                limited
                                partnerships) that provides us with personal data on individuals connected to you for
                                any reason
                                in relation to your investment with us or our oversight of your account, this will be
                                relevant
                                for those individuals and you should transmit this document to such individuals or
                                otherwise
                                advise them of its content.</p>
                            <p><strong>Use of Personal Data</strong></p>
                            <p>The legal basis for our processing of your personal data generally includes one of the
                                following:
                                (a) you have consented to our processing of your personal data; (b) processing is needed
                                to
                                fulfill a request made by you or our contractual obligations; (c) processing is required
                                to
                                comply with a legal or regulatory obligation; or (d) processing is necessary for reasons
                                that
                                are in our legitimate interest as a company, such as to protect our business. For
                                example, we
                                may use personal data:</p>
                            <ul>
                                <li>to provide you notices about your subscription to our projects, including any
                                    transaction
                                    notices;
                                </li>
                                <li>to notify you about changes to our website or any of the products or services we
                                    offer or
                                    provide through it;
                                </li>
                                <li>for the purposes for which you provided it to us (e.g., to evaluate your eligibility
                                    to
                                    invest in our projects and accounts and in connection with managing, or our
                                    oversight of,
                                    such projects and investments therein);
                                </li>
                                <li>to respond to your inquiries and communications to us;</li>
                                <li>to improve, maintain, and operate our offerings;</li>
                                <li>to fulfill our obligations and enforce our rights arising under our customer
                                    contracts;
                                </li>
                                <li>to market to you about products and services in which you may be interested, unless
                                    you have
                                    opted out of our marketing messages;
                                </li>
                                <li>in any other way that we may describe when you provide the information; and</li>
                                <li>for any other purpose with your consent.</li>
                            </ul>
                            <p><strong>Sharing of Personal Data</strong></p>
                            <p>We do not sell your personal data to any third parties for monetary consideration. We may
                                share
                                your personal data as needed to fulfill the purposes described in the &ldquo;Use of
                                Personal
                                Data&rdquo; section above, including:</p>
                            <ul>
                                <li>to our subsidiaries and affiliates;</li>
                                <li>with nonaffiliated persons and entities that assist us in managing and operating our
                                    advised
                                    projects or that perform services for us, such as attorneys, brokers,
                                    administrators,
                                    accountants, auditors and custodians;
                                </li>
                                <li>to lenders who provide financing for our projects;</li>
                                <li>with other investors in our projects (unless you have opted out of such sharing);
                                </li>
                                <li>to our affiliates, for marketing purposes unless you have opted out of such sharing,
                                    or for
                                    purposes
                                </li>
                                <li>of facilitating your investments or requests for information;</li>
                                <li>to the relevant funds in which you have invested or are interested in investing;
                                </li>
                                <li>to third party companies or individuals that contract with us to perform servicing
                                    functions
                                    such as
                                </li>
                                <li>record-keeping, accounting and administrative services and computer-related
                                    services;
                                </li>
                                <li>as permitted or required by law, including to verify eligibility under OFAC, for
                                    governmental permits or licensing, or other regulatory and compliance requirements;
                                </li>
                                <li>for any other purpose disclosed by us when you provide the information; and</li>
                                <li>as requested or approved by you (including to your advisors, which can include,
                                    among
                                    others, accountants, investment advisors, and/or attorneys).
                                </li>
                            </ul>
                            <p>Companies we hire to provide services are not authorized to use your personal data for
                                their own
                                purposes and are obligated to maintain confidentiality of such data. We do not provide
                                your
                                personal data to mailing list vendors or solicitors for any purpose.</p>
                            <p>In the event of a merger, consolidation, sale, or transfer of all or substantially all of
                                our
                                assets or business, one of the assets which would generally be transferred is the data
                                we have
                                collected. We will advise a successor or successors in interest of the terms of this
                                policy and
                                our expectation that the successor(s) in interest will comply with the terms hereof.</p>
                            <p>We may also disclose your personal data to comply with any court order, law, or legal,
                                process,
                                including to respond to any government or regulatory request; to enforce or apply our
                                terms of
                                use and other agreements (including any agreement for the your investment into any of
                                our
                                funds); and if we believe disclosure is necessary or appropriate to protect our rights,
                                property, or safety, or the rights, property, or safety of our customers, or others.</p>
                            <p><strong>Opt Out Options</strong></p>
                            <p>Natural persons may opt out of our disclosure of your personal data for the following
                                purposes:</p>
                            <ul>
                                <li>internal marketing efforts (regarding our offerings);</li>
                                <li>external marketing efforts (regarding our affiliates&rsquo; offerings); or</li>
                                <li>providing current and potential investors a list of investors in our projects.</li>
                            </ul>
                            <p>To opt out, please contact us in writing or by email as set out at the end of this
                                policy. Please
                                be specific about which of the above purposes you wish to opt out from, so we can
                                efficiently
                                process your request.</p>
                            <p><strong>Do Not Track Signals</strong></p>
                            <p>Some web browsers have &ldquo;Do Not Track&rdquo; or similar features that allow you to
                                tell each
                                website you visit that you do not want your activities on that website tracked. At
                                present, the
                                Site does not respond to &ldquo;Do Not Track&rdquo; signals and consequently, the Site
                                will
                                continue to collect information about you even if your browser&rsquo;s &ldquo;Do Not
                                Track&rdquo;
                                feature is activated.</p>
                            <p><strong>Employee Access to Data</strong></p>
                            <p>We have implemented policies and procedures designed to restrict access to nonpublic
                                personal
                                data to those employees with a legitimate business reason to have access to such
                                personal data.
                                These employees are educated on the importance of maintaining the confidentiality and
                                security
                                of this data and are required to abide by our data handling practices.</p>
                            <p><strong>Protection of Data</strong></p>
                            <p>We maintain commercially reasonable administrative, physical, and technical security
                                standards
                                designed to protect your personal data, whether written, spoken or electronic. The
                                safety and
                                security of your information also depends on you. Where you have been provided a
                                password for
                                access to our website or your account, you are responsible for keeping this password
                                confidential. We ask you not to share your</p>
                            <p>password with anybody. We urge you to be careful about giving out sensitive or
                                confidential
                                information through email, as email may not provide a means for complete security and
                                private
                                communications between us and yourself. Unfortunately, the transmission of information
                                via the
                                internet is not completely secure. Although we do our best to protect your personal
                                data, we
                                cannot guarantee the security of your personal data transmitted to us, including to our
                                website.
                                Any transmission of personal data is at your own risk. We are not responsible for
                                circumvention
                                of any private settings or security measures we deploy.</p>
                            <p><strong>Data Retention</strong></p>
                            <p>We may retain your data so long as we can reasonably foresee the data may be required in
                                connection with our business relationship with you. In some cases, we will retain the
                                data for a
                                longer period as necessary to comply with our legal obligations, follow records
                                retention
                                policies, resolve disputes, and enforce our agreements.</p>
                            <p><strong>Children</strong></p>
                            <p>Our website and services are not directed toward children under 18, and no one under the
                                age of
                                18 may provide any information to us, including on the website. We do not knowingly
                                collect
                                personal data directly from children under 18. If a parent or guardian becomes aware
                                that his or
                                her child has provided us with personal data without their consent, please contact us as
                                set
                                forth at the end of this policy and we will take reasonable steps to promptly remove
                                such data
                                from our systems (subject to any applicable legally required or permitted retention
                                standards).</p>
                            <p><strong>Cross-border Transfers of Personal Data</strong></p>
                            <p>We are based in the United States, and personal data collected by us and our affiliates
                                worldwide
                                may be transferred to the United States for processing. By using our services or
                                submitting
                                personal data to us or our affiliates, you consent to the transmission of your data
                                outside your
                                own country. We are generally the &ldquo;data controller&rdquo; as that term is used
                                under
                                applicable laws.</p>
                            <p>Your personal data may be processed either locally in the jurisdiction where you work or
                                reside,
                                or in any other jurisdiction where we or our approved third-party service providers
                                operate,
                                worldwide, depending on the needs of the business, to the extent necessary and as
                                permitted
                                by</p>
                            <p><strong>Your California Privacy Rights</strong></p>
                            <p>California law entitles California residents to certain additional protections regarding
                                personal
                                data. For purposes of this section alone, &ldquo;personal data&rdquo; means any
                                information that
                                identifies, relates to, describes, is capable of being associated with, or could
                                reasonably be
                                linked, directly or indirectly, with a particular California resident or household.
                                California
                                residents have the right to request:</p>
                            <ul>
                                <li>information regarding your personal information we have collected in the past 12
                                    months
                                    (including the categories of personal information we have collected, the categories
                                    of
                                    sources of such information, and the purposes for which we have collected such
                                    information);
                                </li>
                                <li>notice of whether we have disclosed your personal information to third parties in
                                    the past
                                    12 months (and if so, what categories of information we have disclosed, and what
                                    categories
                                    of third parties we have disclosed it to);
                                </li>
                                <li>a copy of your personal information collected by us in the past 12 months; and</li>
                                <li>that your personal information be deleted.</li>
                            </ul>
                            <p>We will not discriminate against you if you choose to exercise any of these rights. To
                                make any
                                of the above requests, please contact us as set forth at the end of this policy. We may
                                require
                                verification of your identity before further processing your request. In certain
                                instances, we
                                may be permitted by law to decline some or all of such request.</p>
                            <p>You may exercise your right to know and your right to deletion two-times a year free of
                                charge.
                                To exercise your right to know or your right to deletion, contact us at (972) 556-1700
                                or email
                                us at privacy@jpi.com.</p>
                            <p>We will take steps to verify your identity before processing your request to know or
                                request to
                                delete. We will not fulfill your request unless you have provided sufficient information
                                for us
                                to reasonably verify you are the individual about whom we collected Personal
                                Information. We may
                                request additional information about you so that we can match the information you
                                provide to
                                information we already maintain about you. We will only use the Personal Information
                                provided in
                                the verification process to verify your identity or authority to make a request and to
                                track and
                                document request responses, unless you initially provided the information for another
                                purpose.</p>
                            <p>You may use an authorized agent to submit a request to know or a request to delete. When
                                we
                                verify your agent&rsquo;s request, we may verify both your and your agent&rsquo;s
                                identity and
                                request a signed document from you that authorizes your agent to make the request on
                                your
                                behalf. To protect your Personal Information, we reserve the right to deny a request
                                from an
                                agent that does not submit proof that they have been authorized by you to act on their
                                behalf.</p>
                            <p><strong>Shine the Light</strong>: California Civil Code Section 1798.83 gives California
                                residents the rights to request from us once per calendar year certain information
                                regarding our
                                disclosure of their Personal Information to third parties for those third parties&rsquo;
                                direct
                                marketing purposes. We may share your Personal Information with affiliated third
                                parties, some
                                of which do not share the name of Mill Creek Residential, for their own direct marketing
                                purposes. You may request information regarding the disclosure of your Personal
                                Information to
                                third parties for those third parties&rsquo; direct marketing purposes by contacting us
                                at
                                Privacy@jpi.com.</p>
                            <p><strong>Revisions to this Policy</strong></p>
                            <p>We recognize and respect the privacy concerns of individuals. We are committed to
                                safeguarding
                                this data. As a member of the financial services industry, we are providing you this
                                policy for
                                informational purposes and will update and distribute it as required by law. It is also
                                available to you upon request. We may revise this policy from time to time. If we make a
                                material change to this policy, we will post the updated version (with the date of
                                change(s)
                                noted in the policy) on our website and other places we may deem appropriate, and/or
                                notify you
                                by mail or email, so that you are aware of what data we collect, how we use it, and
                                under what
                                circumstances, if any, we disclose it.</p>
                            <p><strong>Questions about our Privacy Policy</strong></p>
                            <p>If you have any questions about our privacy policy, please contact us as set forth below,
                                because
                                your privacy and the confidentiality of your data are very important to us.</p>
                            <p>Email: <a href="mailto:privacy@jpi.com">privacy@jpi.com</a><br/> Mail: Attn: JPI Privacy
                                Team,
                                600 E. Las Colinas Blvd Suite 1800, Irving TX 75039<br/> Phone: (972) 556-1700</p>
                            <br/>
                            <br/>
                            <p><strong>USER TERMS OF EMPLOYEE PAYMENT SERVICE</strong></p>
                            <p>Updated as of: 8/31/2021</p>
                            <p>The https://jpi.com website, and any other website on which these Terms of Service appear
                                (the
                                "Websites"), and any software, mobile applications, products, devices or other services
                                offered
                                by JPI from time to time and other services offered through third parties integrating
                                JPI, and
                                its other legal entities, functionality (collectively, "Services"), are made available
                                by JPI.
                                You may access and utilize the Websites and Services only under the following terms and
                                conditions ("Terms of Service").</p>
                            <p>These Terms of Service apply to all users of all JPI Services, which includes, but is not
                                limited
                                to, Websites, Data, Servers and other related Services. By using the Websites and
                                Services you
                                signify your acceptance of these Terms of Service, JPI&rsquo;s Privacy Notice, and JPI&rsquo;s
                                Copyright Policy, which are incorporated by reference into these Terms of Service and
                                made a
                                part hereof. If you do not agree to the Terms of Service, you must discontinue using the
                                Websites and Services.</p>
                            <p>To the extent that your use of the Services is governed by a Master Services Agreement,
                                the
                                Master Services Agreement shall control in the event of conflict with these terms.</p>
                            <p><strong>Website Limited License</strong></p>
                            <p>As a user of the Websites and Services you are granted a nonexclusive, nontransferable,
                                revocable, limited license to access and use the Websites and Services in accordance
                                with these
                                Terms of Service. JPI may terminate this license at any time for any reason. To the
                                extent use
                                of the Services requires login information, the foregoing does not automatically grant
                                you a
                                right of access and you must obtain login information as required by the Services.</p>
                            <p><strong>Limitations On and Scope of Use</strong></p>
                            <p>Any unauthorized use of the Websites and Services is prohibited. You may not use the
                                Services
                                to:</p>
                            <ul>
                                <li>Copy, modify, reproduce, republish, distribute, display, or transmit for commercial,
                                    non-profit or public purposes all or any portion of the Websites or the Services.
                                </li>
                                <li>Manually extract, decompile, reverse engineer, disassemble or create derivative
                                    works from
                                    the Websites or the Services.
                                </li>
                                <li>Determine the site architecture or extract data or information about usage,
                                    individual
                                    identities of other users of the Services via use of any network monitoring or
                                    discovery
                                    software or otherwise.
                                </li>
                                <li>Monitor, copy, scan, review, index, mirror, ping or validate the Services via robot,
                                    spider,
                                    other automatic software or device, process, approach or methodology, manual or
                                    otherwise
                                    (methods such as web scraping, harvesting, data extraction, data validation or
                                    verification
                                    are prohibited).
                                </li>
                                <li>Transmit any computer virus, worm, defect, trojan horse, or any other item of a
                                    destructive
                                    nature, or to upload any virus or malicious code.
                                </li>
                                <li>Transmit any false, misleading, fraudulent or illegal communications, information or
                                    data.
                                </li>
                                <li>Phish, spoof, commit illegal or fraudulent activity, or violate laws in your
                                    jurisdiction.
                                </li>
                                <li>Access unauthorized information.</li>
                                <li>Solicit information from minors or harm or threaten to harm minors.</li>
                                <li>Attack, threaten violence, stalk, harass, incite, harm, or intimidate any other
                                    user, person
                                    or organization, or engage in any other threatening behavior.
                                </li>
                                <li>Transmit or post any material that is abusive, harassing, tortious, defamatory,
                                    vulgar,
                                    pornographic, obscene, libelous, fraudulent, invasive of another's privacy, hateful,
                                    or
                                    racially, ethnically, or otherwise objectionable.
                                </li>
                                <li>Transmit any unsolicited or unauthorized advertising, promotional materials, junk
                                    mail,
                                    spam, chain letters, contests, pyramid schemes, surveys, or any other form of
                                    solicitation
                                    or mass messaging, whether commercial in nature or not.
                                </li>
                                <li>Export or re-export this Website or any portion thereof in violation of the export
                                    control
                                    laws and regulations of the United States of America.
                                </li>
                            </ul>
                            <p><strong>Intellectual Property Rights</strong></p>
                            <p>Except as expressly provided in these Terms of Service, nothing contained herein shall be
                                construed as conferring any license or right, by implication, estoppel or otherwise,
                                under
                                copyright or other intellectual property rights. You agree that the Websites and
                                Services are
                                protected by copyrights, trademarks, service marks, patents or other proprietary rights
                                and
                                laws. Rogers-O&rsquo;Brien Construction, the JPI logo, and all other JPI trademarks,
                                service
                                marks, product names, and trade names of JPI appearing on or in conjunction with the
                                Websites
                                and Services are owned by JPI. JPI does not grant you the right to use or display any
                                trademark,
                                service mark, product name, trade name or logo appearing on the Websites or the Services
                                without
                                JPI&rsquo;s prior written consent.</p>
                            <p><strong>Linking to the Websites and Services</strong></p>
                            <p>You may provide links to the Services, provided (i) you do not remove or obscure, by
                                framing or
                                otherwise, any portion of the web pages, the Terms of Service, or any notices on the
                                Services
                                and (ii) you discontinue providing links to the Services if requested by JPI.</p>
                            <p><strong>License of Your Content to JPI</strong></p>
                            <p>By posting, publishing, uploading, or distributing any data, information, text, graphics,
                                links,
                                messages, reviews, content, or other materials for use on the Services (other than on
                                https://JPI.com or on the mobile applications), you grant (or warrant that the owner of
                                such
                                rights has expressly granted) JPI a perpetual, worldwide, royalty-free, irrevocable,
                                non-exclusive right and license, with the right to sublicense, to use, modify,
                                reproduce,
                                publish, adapt, publicly perform, publicly display, digitally display and digitally
                                perform,
                                translate, create derivative works from and distribute such postings or incorporate such
                                postings into any form, medium, or technology now known or later developed. You agree
                                that you
                                shall have no recourse against JPI for any alleged or actual infringement or
                                misappropriation of
                                any proprietary right in postings you provide to JPI.</p>
                            <p><strong>Copyright Notices &amp; Complaints</strong></p>
                            <p>It is JPI&rsquo;s policy to respond to notices of alleged copyright infringement that
                                comply with
                                the Digital Millennium Copyright Act (the "DMCA"). For more information about JPI&rsquo;s
                                DMCA
                                procedures, please see our Copyright Policy. Your acceptance of these Terms and
                                Conditions is
                                also your consent to the copyright practices described in our Copyright Policy. JPI may
                                terminate any user's access to the Websites or Services if JPI determines that user is a
                                "repeat
                                infringer."</p>
                            <p><strong>Relationship of JPI and You</strong></p>
                            <p>You are an independent third party to the Services, and nothing in this Agreement will
                                create or
                                represent that there is any partnership, joint venture, agency, franchise, sales
                                relationship,
                                or employment relationship between you and JPI.</p>
                            <p><strong>No Solicitation</strong></p>
                            <p>You shall not distribute on or through the Services any postings or presentations of data
                                containing any advertising, promotion, solicitation for goods, services or funds or
                                solicitation
                                for others to become members of any enterprise or organization.</p>
                            <p><strong>Registration</strong></p>
                            <p>Certain sections of the Websites or Services may require you to register. If registration
                                is
                                requested, you agree to provide accurate and complete registration information. It is
                                your
                                responsibility to inform JPI of any changes to that information. You understand that by
                                registering with the Websites or Services, you may receive regular updates regarding new
                                or
                                existing JPI applications. You may request to unsubscribe by following the directions in
                                such
                                updates and JPI will permanently remove you from JPI&rsquo;s registered list of
                                subscribers.</p>
                            <p><strong>Postings in Interactive Areas</strong></p>
                            <p>If you participate in interactive areas on the Services, you shall not post, publish,
                                upload or
                                distribute any postings which are unlawful or abusive in any way. JPI may delete your
                                postings
                                at any time for any reason without notification of or permission from you, however, JPI
                                has no
                                obligation to monitor or screen postings and is not responsible for the content in such
                                postings
                                or any content linked to or from such postings. But JPI does reserve the right, in its
                                sole
                                discretion, to monitor interactive areas, screen postings, edit postings, cause postings
                                not to
                                be posted, published, uploaded or distributed, and remove postings, at any time and for
                                any or
                                no reason without notification of or permission from you.</p>
                            <p><strong>Receipt of Payments</strong></p>
                            <p>If you register to create an account to receive payments via our application, you
                                expressly
                                authorize JPI&rsquo;s service provider, Dwolla, Inc. to originate credit transfers to
                                your
                                financial institution account. You must be at least 13 years old and obtain parental
                                permission
                                if under 18 to receive funds. You authorize JPI to collect and share with Dwolla your
                                personal
                                information including full name, email address and financial information, and you are
                                responsible for the accuracy and completeness of that data. Dwolla&rsquo;s Privacy
                                Policy is
                                available <a
                                    href="https://nam04.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.dwolla.com%2Flegal%2Fprivacy%2F&amp;data=04%7C01%7Cmichael.shepherd%40jpi.com%7C00aceb73c2cf4b44d07708d96cadc6c3%7C81c6c67957f94d039c5d8f6bb9e76efa%7C1%7C0%7C637660315900035478%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C1000&amp;sdata=s05%2BA0c2PHO3wHOB2j01Q9sa4JlxwNxnq7R%2B%2FeEND3s%3D&amp;reserved=0">here</a>
                            </p>
                            <p><strong>Errors and Corrections</strong></p>
                            <p>JPI does not represent or warrant that the Services will be error-free, free of viruses
                                or other
                                harmful components, or that defects will be corrected or that it will always be
                                accessible. JPI
                                does not warrant or represent that postings or information available on or through the
                                Websites
                                or Services will be correct, accurate, timely, or otherwise reliable. JPI may make
                                improvements
                                and/or changes to its features or functionality at any time.</p>
                            <p><strong>Third-Party Content and Links</strong></p>
                            <p>Third-party content may appear on the Services or may be accessible via links from this
                                Website.
                                JPI will not be responsible for and assumes no liability for any infringement, mistakes,
                                misstatements of law, defamation, slander, libel, omissions, falsehood, obscenity,
                                pornography
                                or profanity in the statements, opinions, representations or any other form of content
                                contained
                                in any third-party content appearing on the Services. You understand that the
                                information and
                                opinions in the third-party content is neither endorsed by nor does it reflect the
                                belief or
                                opinion of JPI. Further, information and opinions provided by employees and agents of
                                JPI in
                                interactive areas of the Services are not necessarily endorsed by JPI and do not
                                necessarily
                                represent the beliefs and opinions of JPI. Rogers-O&rsquo;Brien Construction, or other
                                third-party users of the Services, may provide links to other websites or resources. JPI
                                has no
                                control over such sites and resources. You acknowledge and agree that JPI is not
                                responsible for
                                the availability of such external sites or resources, and does not endorse and is not
                                responsible or liable for any content, advertising, products or other materials
                                contained in or
                                available from such sites or resources. You acknowledge that use of any third-party
                                website is
                                governed by the terms of service and privacy policy for that website, which terms you
                                are
                                responsible for reading and reviewing, and not by these Terms of Service or JPI&rsquo;s
                                Privacy
                                Notice. You further acknowledge and agree that JPI shall not be responsible or liable,
                                directly
                                or indirectly, for any damage or loss caused or alleged to be caused by or in connection
                                with
                                use of or reliance on any such content, goods or services available on or through any
                                third-party site or resource. JPI reserves the right to disable any link or remove any
                                third-party content at any time in its sole discretion.</p>
                            <p><strong>DISCLAIMER</strong></p>
                            <p>THE WEBSITES AND SERVICES ARE PROVIDED ON AN "AS IS, AS AVAILABLE" BASIS. JPI EXPRESSLY
                                DISCLAIMS
                                ALL WARRANTIES, INCLUDING THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
                                PURPOSE
                                AND NON-INFRINGEMENT. JPI DISCLAIMS ALL RESPONSIBILITY FOR ANY LOSS, INJURY, CLAIM,
                                LIABILITY,
                                OR DAMAGE OF ANY KIND RESULTING FROM, ARISING OUT OF OR IN ANY WAY RELATED TO (A) ANY
                                ERRORS IN
                                OR OMISSIONS FROM THE WEBSITES OR SERVICES INCLUDING, BUT NOT LIMITED TO, TECHNICAL
                                INACCURACIES
                                AND TYPOGRAPHICAL ERRORS, (B) THIRD-PARTY COMMUNICATIONS, (C) ANY THIRD-PARTY PLATFORMS,
                                WEBSITES OR CONTENT THEREIN DIRECTLY OR INDIRECTLY ACCESSED THROUGH LINKS ON THE
                                WEBSITES OR
                                SERVICES, INCLUDING BUT NOT LIMITED TO ANY ERRORS IN OR OMISSIONS THEREFROM, (D) THE
                                UNAVAILABILITY OF THE SERVICES, (E) YOUR USE OF THE SERVICES, OR (F) YOUR USE OF ANY
                                EQUIPMENT
                                OR SOFTWARE IN CONNECTION WITH THE SERVICES.</p>
                            <p><strong>LIMITATION OF LIABILITY</strong></p>
                            <p>JPI SHALL NOT BE LIABLE FOR ANY LOSS, INJURY, CLAIM, LIABILITY, OR DAMAGE OF ANY KIND
                                RESULTING
                                FROM YOUR USE OF THE WEBSITE OR SERVICES, ANY FACTS OR OPINIONS APPEARING ON OR THROUGH
                                AN
                                INTERACTIVE AREA, OR ANY THIRD PARTY COMMUNICATIONS. JPI SHALL NOT BE LIABLE FOR ANY
                                SPECIAL,
                                DIRECT, INDIRECT, INCIDENTAL, PUNITIVE OR CONSEQUENTIAL DAMAGES OF ANY KIND WHATSOEVER
                                (INCLUDING, WITHOUT LIMITATION, ATTORNEYS' FEES) IN ANY WAY DUE TO, RESULTING FROM, OR
                                ARISING
                                IN CONNECTION WITH THE USE OF OR INABILITY TO USE THE WEBSITE OR SERVICES, THE
                                INTERACTIVE
                                AREAS, OR ANY THIRD-PARTY COMMUNICATIONS.</p>
                            <p><strong>Indemnification</strong></p>
                            <p>You agree to indemnify, defend and hold JPI, its officers, directors, employees, agents,
                                licensors, and suppliers harmless from and against all claims, losses, expenses, damages
                                and
                                costs, including reasonable attorneys' fees, resulting from any violation of these Terms
                                of
                                Service by you or arising from or related to any postings submitted by you.</p>
                            <p><strong>Governing Law</strong></p>
                            <p>These Terms of Service are to be governed by and construed in accordance with the
                                internal laws
                                of the State of Texas, without regard for principles of conflicts of laws. Any action,
                                claim,
                                dispute or proceeding arising out of or relating to these Terms of Service shall be
                                brought
                                exclusively in the state and federal courts sitting in Dallas, TX.</p>
                            <p><strong>Privacy</strong></p>
                            <p>Your use of these Services is subject to these Terms of Service and JPI&rsquo;s Privacy
                                Notice.</p>
                            <p><strong>Severability of Provisions</strong></p>
                            <p>These Terms of Service incorporate by reference any notices contained on this Website,
                                the
                                Privacy Notice, or the Copyright Policy, and constitute the entire agreement with
                                respect to
                                access to and use of this Website. In the event there is conflict amongst the terms of
                                the
                                foregoing, these Terms of Service prevail. If any provision of these Terms of Service is
                                unlawful, void or unenforceable, then that provision shall be deemed severable from the
                                remaining provisions and shall not affect their validity and enforceability.</p>
                            <p><strong>Modifications to Terms of Service</strong></p>
                            <p>JPI may, in its sole discretion, modify or revise these Terms of Service, including
                                without
                                limitation JPI&rsquo;s Privacy Notice, at any time by posting the amended terms on the
                                Websites
                                or otherwise linking to them in the Services. JPI&rsquo;s will post a notice on the
                                Websites and
                                Services that the Terms of Services and/or Privacy Notice have been updated. You agree
                                that your
                                use of this Website, after the date on which the Terms of Service changed, will
                                constitute your
                                acceptance of the updated Terms of Service, and that you agree to be bound by such
                                modifications
                                or revisions.</p>
                            <p><strong>Copyright Policy</strong></p>
                            <p><strong>Reporting Claims of Copyright Infringement</strong></p>
                            <p>JPI takes claims of copyright infringement seriously. We will respond to notices of
                                alleged
                                copyright infringement that comply with applicable law. If you believe any materials
                                accessible
                                on or from the Websites or Services infringe your copyright, you may request removal of
                                those
                                materials (or access to them) from the Websites or Services by submitting written
                                notification
                                to our Copyright Agent (designated below). In accordance with the Online Copyright
                                Infringement
                                Liability Limitation Act of the Digital Millennium Copyright Act (17 U.S.C. &sect; 512)
                                ("DMCA"), the written notice (the "DMCA Notice") must include substantially the
                                following:</p>
                            <ul>
                                <li>Your physical or electronic signature</li>
                                <li>Identification of the copyrighted work you believe has been infringed or, if the
                                    claim
                                    involves multiple works on the Websites or Services, a representative list of such
                                    works
                                </li>
                                <li>Identification of the material you believe to be infringing, in a sufficiently
                                    precise
                                    manner to allow us to locate that material
                                </li>
                                <li>Adequate information to allow us to contact you (including your name, postal
                                    address,
                                    telephone number, and, if available, email address)
                                </li>
                                <li>A statement that you have a good faith belief that use of the copyrighted material
                                    is not
                                    authorized by the copyright owner, its agent, or the law
                                </li>
                                <li>A statement that the information in the written notice is accurate</li>
                                <li>A statement, under penalty of perjury, that you are authorized to act on behalf of
                                    the
                                    copyright owner
                                </li>
                            </ul>
                            <p>DMCA Notices may be sent to our designated Copyright Agent at:</p>
                            <p>JPI<br/> 600 E Las Colinas Blvd #1800<br/> Irving TX 75039</p>
                            <p>DMCA@jpi.com</p>
                            <p>If you fail to comply with all the requirements of Section 512(c)(3) of the DMCA, your
                                DMCA
                                Notice may not be effective.</p>
                            <p>Please be aware that if you knowingly materially misrepresent that material or activity
                                on the
                                Websites or Services is infringing your copyright, you may be held liable for damages
                                (including
                                costs and attorneys' fees) under Section 512(f) of the DMCA.</p>
                            <p><strong>Repeat Infringers</strong></p>
                            <p>In appropriate circumstances, JPI will disable and/or terminate the accounts of users who
                                are
                                repeat infringers.</p>
                        </div>
                    </div>
                </div>
                <div class="row" id="terms_condition" style="display:none">
                    <div class="input-field col s12">
                        <p>
                            <label>
                                <input type="checkbox" id="term_checkbox" checked/>
                                <span>By clicking submit you agree to our Privacy Policy and Terms and Conditions.</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class='text-center'>
                            <input type="hidden" id="registration_step" name="registration_step" value="1">
                            <button disabled="true" type="submit" class="defaultbtn apj-reg-btn" id='register_user'
                                    style="display: none">Register
                            </button>
                            <button type="submit" class="defaultbtn apj-reg-btn" id='register_user_next'>Next</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 mt--6">
                        <p class="margin center-align medium-small"><a href="{{ route('employee.login.show')}}"
                                                                       class="forgot-pasw-text">Already have an account?
                                Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
