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
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">local_phone</i>
                        <input id="phone_number" type="text" class="@error('phone_number') is-invalid @enderror"
                               value="{{ old('phone_number') }}" autocomplete="phone_number" name="phone_number">
                        <label for="phone_number" class="center-align">Phone Number</label>
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
                            <p><strong>TERMS OF SERVICE</strong></p>
							<p><strong>EMPLOYEE PHONE RESIMBURSEMENT SYSTEM</strong></p>
                            <p>Updated as of: 8/31/2021</p>
                            <p>Thank you for registering for the Employee Phone Reimbursement System.  JPI is excited to bring this new phone reimbursement benefit to its Associates.  We have created this system to support your registration and the administration of this new benefit. These Terms of Service, together with (i) the JPI Employment Handbook, JPI Code of Conduct, Mobile Phone Reimbursement Policy and other policies or notices promulgated by JPI from time to time (“JPI Policies”) and (ii) the Dwolla Terms of Service, the Dwolla Privacy Policy and the Dwolla Account Verification Terms and Conditions (the Dwolla Policies) govern your use of the Websites and/or Services (each defined below).    You are invited to check back from time to time to review these Terms of Service as we continue to roll-out and improve this new enhanced benefit to our Associates.</p>
							
							<p>These Terms of Service apply to the JPI Employee Phone Reimbursement System and any other software, application or websites on which they appear (the "Websites").  The software, functionality and services provided to you by and through the Websites (collectively, (collectively, "Services"), are made available to you by JPI Employment Services, LLC and/or its affiliated entities (collectively “JPI”) and service providers. You may access and utilize the Websites and Services only under the following terms and conditions ("Terms of Service").</p>
							
							<p>These Terms of Service apply to all users of the Services. By registering for the Website and using the Services, you signify your acceptance of these Terms of Service. If you do not agree to the Terms of Service, you must discontinue using the Websites and Services.</p>
							
                            <p><strong>Website Limited License</strong></p>
                            <p>As a user of the Websites and Services you are granted a nonexclusive, nontransferable, revocable, limited license to access and use the Websites and Services in accordance with these Terms of Service. JPI may terminate this license at any time for any reason. To the extent use of the Services requires login information, the foregoing does not automatically grant you a right of access and you must obtain login information as required by the Services.</p>
							
							
                            <p><strong>Limitations On and Scope of Use</strong></p>
                            <p>Any unauthorized use of the Websites and Services is prohibited. You may not use the Services to:</p>
                            <ul>
									<li>Copy, modify, reproduce, republish, distribute, display, or transmit for commercial, non-profit or public purposes all or any portion of the Websites or the Services. </li>
									<li>Manually extract, decompile, reverse engineer, disassemble or create derivative works from the Websites or the Services. </li>
									<li>Determine the site architecture or extract data or information about usage, individual identities of other users of the Services via use of any network monitoring or discovery software or otherwise. </li>
									<li>Monitor, copy, scan, review, index, mirror, ping or validate the Services via robot, spider, other automatic software or device, process, approach or methodology, manual or otherwise (methods such as web scraping, harvesting, data extraction, data validation or verification are prohibited). </li>
									<li>Transmit any computer virus, worm, defect, trojan horse, or any other item of a destructive nature, or to upload any virus or malicious code. </li>
									<li>Transmit any false, misleading, fraudulent or illegal communications, information or data. </li>
									<li>Phish, spoof, commit illegal or fraudulent activity, or violate laws in your jurisdiction. </li>
									<li>Access unauthorized information. </li>
									<li> Export or re-export this Website or any portion thereof in violation of the export control laws and regulations of the United States of America. </li>
                            </ul>
							
                            <p><strong>Intellectual Property Rights</strong></p>
                            <p>Except as expressly provided in these Terms of Service, nothing contained herein shall be construed as conferring any license or right, by implication, estoppel or otherwise, under copyright or other intellectual property rights. You agree that the Websites and Services are protected by copyrights, trademarks, service marks, patents or other proprietary rights and laws. The  JPI logo, and all other JPI trademarks, service marks, product names, and trade names of JPI appearing on or in conjunction with the Websites and Services are owned by JPI. JPI does not grant you the right to use or display any trademark, service mark, product name, trade name or logo appearing on the Websites or the Services without JPI’s prior written consent.</p>
							
							
                            <p><strong>Registration</strong></p>
                            <p>The Websites or Services will require you to register. You agree to provide accurate and complete registration information. It is your responsibility to inform JPI of any changes to that information. You understand that by registering with the Websites or Services, you may receive regular updates regarding new or existing JPI applications. </p>
							
							
							
                            <p><strong>Errors and Corrections</strong></p>
							<p>JPI does not represent or warrant that the Services will be error-free, free of viruses or other harmful components, or that defects will be corrected or that it will always be accessible. JPI does not warrant or represent that postings or information available on or through the Websites or Services will be correct, accurate, timely, or otherwise reliable. JPI may make improvements and/or changes to its features or functionality at any time.</p>
							
							
							
                            <p><strong>Third-Party Content and Links</strong></p>
							<p>Third-party content may appear on the Services or may be accessible via links from this Website. JPI will not be responsible for and assumes no liability for any infringement, mistakes, misstatements of law, defamation, slander, libel, omissions, falsehood, obscenity, pornography or profanity in the statements, opinions, representations or any other form of content contained in any third-party content appearing on the Services. The Websites may include links to other websites or resources.  JPI has no control over such sites and resources. You acknowledge and agree that JPI is not responsible for the availability of such external sites or resources and does not endorse and is not responsible or liable for any content, advertising, products or other materials contained in or available from such sites or resources. You acknowledge that use of any third-party website is governed by the terms of service and privacy policy for that website, which terms you are responsible for reading and reviewing, and not by these Terms of Service. You further acknowledge and agree that JPI shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any third-party site or resource. JPI reserves the right to disable any link or remove any third-party content at any time in its sole discretion.</p>
							
							
							
                            <p><strong>DISCLAIMER</strong></p>
							<p>THE WEBSITES AND SERVICES ARE PROVIDED ON AN "AS IS, AS AVAILABLE" BASIS. JPI EXPRESSLY DISCLAIMS ALL WARRANTIES, INCLUDING THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. JPI DISCLAIMS ALL RESPONSIBILITY FOR ANY LOSS, INJURY, CLAIM, LIABILITY, OR DAMAGE OF ANY KIND RESULTING FROM, ARISING OUT OF OR IN ANY WAY RELATED TO (A) ANY ERRORS IN OR OMISSIONS FROM THE WEBSITES OR SERVICES INCLUDING, BUT NOT LIMITED TO, TECHNICAL INACCURACIES AND TYPOGRAPHICAL ERRORS, (B) THIRD-PARTY COMMUNICATIONS, (C) ANY THIRD-PARTY PLATFORMS, WEBSITES OR CONTENT THEREIN DIRECTLY OR INDIRECTLY ACCESSED THROUGH LINKS ON THE WEBSITES OR SERVICES, INCLUDING BUT NOT LIMITED TO ANY ERRORS IN OR OMISSIONS THEREFROM, (D) THE UNAVAILABILITY OF THE SERVICES, (E) YOUR USE OF THE SERVICES, OR (F) YOUR USE OF ANY EQUIPMENT OR SOFTWARE IN CONNECTION WITH THE SERVICES.</p>
                            
							
							
								
							
                            <p><strong>LIMITATION OF LIABILITY</strong></p>
							<p>JPI SHALL NOT BE LIABLE FOR ANY LOSS, INJURY, CLAIM, LIABILITY, OR DAMAGE OF ANY KIND RESULTING FROM YOUR USE OF THE WEBSITE OR SERVICES, ANY FACTS OR OPINIONS APPEARING ON OR THROUGH AN INTERACTIVE AREA, OR ANY THIRD-PARTY COMMUNICATIONS. JPI SHALL NOT BE LIABLE FOR ANY SPECIAL, DIRECT, INDIRECT, INCIDENTAL, PUNITIVE OR CONSEQUENTIAL DAMAGES OF ANY KIND WHATSOEVER (INCLUDING, WITHOUT LIMITATION, ATTORNEYS' FEES) IN ANY WAY DUE TO, RESULTING FROM, OR ARISING IN CONNECTION WITH THE USE OF OR INABILITY TO USE THE WEBSITE OR SERVICES, THE INTERACTIVE AREAS, OR ANY THIRD-PARTY COMMUNICATIONS.</p>
                            
							
							
							
								
							
                            <p><strong>Governing Law</strong></p>
							<p>These Terms of Service are to be governed by and construed in accordance with the internal laws of the State of Texas, without regard for principles of conflicts of laws. Any action, claim, dispute or proceeding arising out of or relating to these Terms of Service shall be brought exclusively in the state and federal courts sitting in Dallas, TX.</p>
                            
							
							
							
							
                            <p><strong>Privacy</strong></p>
							<p>JPI is committed to keeping the personal data collected from employees and other individuals thru this Website and the Services confidential and secure. The proper handling of such personal data is a high priority.  This personal data (“Personal Information”) is information that identifies, relates to, describes, is capable of being associated with, or could reasonably be linked, directly or indirectly, with you or your household, such as your name, email address, IP address, telephone number, and broader categories of information such as your professional, educational or health information, commercial information, internet activity, name, email address, phone number and bank account information. We may also collect Personal Information directly from you and automatically through our use of cookies and other data collection technologies on our Website.</p>
                            
							
							
							
                            <p><strong>Employee Access to Data</strong></p>
							<p>We have implemented policies and procedures designed to restrict access to nonpublic personal data to those employees with a legitimate business reason to have access to such personal data. These employees are educated on the importance of maintaining the confidentiality and security of this data and are required to abide by our data handling practices.</p>
                            
							
							
								
                            <p><strong>Protection of Data</strong></p>
							<p>We maintain commercially reasonable administrative, physical, and technical security standards designed to protect your Personal Information. The safety and security of your information also depends on you. Where you have been provided a password for access to our Website or the Services, you are responsible for keeping this password confidential. We ask you not to share your password with anybody. We urge you to be careful about giving out sensitive or confidential information through email, as email may not provide a means for complete security and private communications between us and yourself. Unfortunately, the transmission of information via the internet is not completely secure. Although we do our best to protect your personal data, we cannot guarantee the security of your personal data transmitted to us, including to the Website. Any transmission of personal data is at your own risk. We are not responsible for circumvention of any private settings or security measures we deploy.  </p>
                            
							
							
								
                            <p><strong>Dwolla/Receipt of Payments</strong></p>
							<p>You expressly authorize JPI’s service provider, Dwolla, Inc. to originate credit transfers to your financial institution account. You must be at least 13 years old and obtain parental permission if under 18 to receive funds. You authorize JPI to collect and share with Dwolla your personal information including full name, email address and financial information, and you are responsible for the accuracy and completeness of that data.  By creating an account and/or registering for the Services, you agree to <a  target="blank" href="https://www.dwolla.com/legal/tos/">Dwolla’s Terms of Service</a>, the <a  target="blank" href="https://www.dwolla.com/legal/privacy/">Dwolla Privacy Policy</a> and the <a  target="blank" href="https://www.dwolla.com/legal/dwolla-account-terms-of-service/#legal-content">Dwolla Account Verification Terms and Conditions</a>. </p>
                            
							
							
								
                            <p><strong>Severability of Provisions</strong></p>
							<p>These Terms of Service, together with anydocuments or noticescontained or referenced on this Website, including without limitation, the JPI Policies and the Dwolla Policies are hereby incorporated by reference andconstitute the entire agreement with respect to access to and use of this Website. In the event there is conflict amongst the terms of the foregoing, these Terms of Service prevail. If any provision of these Terms of Service is unlawful, void or unenforceable, then that provision shall be deemed severable from the remaining provisions and shall not affect their validity and enforceability.  JPI reserves the right to modify, revise or terminate the Website and/or Services at any time in its sole and absolute discretion.</p>
                            
							
								
                            <p><strong>Modifications to Terms of Service</strong></p>
							<p>JPI may, in its sole discretion, modify or revise these Terms of Service, including without limitation JPI’s Privacy Notice, at any time by posting the amended terms on the Websites or otherwise linking to them in the Services. JPI’s will post a notice on the Websites and Services that the Terms of Services and/or Privacy Notice have been updated. You agree that your use of this Website, after the date on which the Terms of Service changed, will constitute your acceptance of the updated Terms of Service, and that you agree to be bound by such modifications or revisions.</p>
                            
							
							
								
                            <p><b>Repeat Infringers</b></p>
							<p>In appropriate circumstances, JPI will disable and/or terminate the accounts of users who are repeat infringers.</p>
                            
							
                        </div>

						 <div class="input-field col s12">
                        <p>
                            <label>
                                <input type="checkbox" id="term_checkbox" />
                                <span>I accept the privacy policy.</span>
                            </label>
                        </p>
                    </div>
				   </div>
                </div>
                <div class="row" id="terms_condition" >

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
