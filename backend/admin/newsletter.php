<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    $email = $_SESSION['email'];
} else {
    echo "<script>location.href='../index';</script>";
}
include 'header.php';
?>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Newsletter</h2>
            <small class="text-muted">Welcome to Paramount Hospital</small>
             <div align="right" style="margin-top: -3rem;">
                <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#compose"><i class="fa-solid fa-paper-plane"></i> Compose</button>
            </div>
        </div>
        <!-- booked_schedule.php -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> Subscribe To Our Newsletter. </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="load/export_csv" class=" waves-effect waves-block">Export CSV</a></li>
                                    <li><a href="load/export_pdf" class=" waves-effect waves-block">Export PDF</a></li>
                                    <li><a href="load/export_txt" class=" waves-effect waves-block">Export Text</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Token</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Compose Modal -->


<!-- Large Size -->
<div class="modal fade" id="compose" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="composeLabel">Message</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" required placeholder="Subject" name="subject">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="elm1" name="compose" rows="4" class="form-control no-resize">
                                        <style>
                                          a[x-apple-data-detectors] {
                                            color: inherit !important;
                                            text-decoration: inherit !important;
                                          }
                                    
                                          #MessageViewBody a {
                                            color: inherit;
                                            text-decoration: none;
                                          }
                                    
                                          p {
                                            line-height: inherit;
                                          }
                                          .text {
                                            text-align: justify;
                                          }
                                    
                                          .desktop_hide,
                                          .desktop_hide table {
                                            mso-hide: all;
                                            display: none;
                                            max-height: 0px;
                                            overflow: hidden;
                                          }
                                    
                                          .image_block img + div {
                                            display: none;
                                          }
                                    
                                          .menu_block.desktop_hide .menu-links span {
                                            mso-hide: all;
                                          }
                                    
                                          @media (max-width: 620px) {
                                            .desktop_hide table.icons-inner {
                                              display: inline-block !important;
                                            }
                                    
                                            .icons-inner {
                                              text-align: center;
                                            }
                                    
                                            .icons-inner td {
                                              margin: 0 auto;
                                            }
                                    
                                            .image_block img.fullWidth {
                                              max-width: 100% !important;
                                            }
                                    
                                            .social_block.desktop_hide .social-table {
                                              display: inline-block !important;
                                            }
                                    
                                            .row-content {
                                              width: 100% !important;
                                            }
                                    
                                            .stack .column {
                                              width: 100%;
                                              display: block;
                                            }
                                    
                                            .mobile_hide {
                                              max-width: 0;
                                              min-height: 0;
                                              max-height: 0;
                                              font-size: 0;
                                              display: none;
                                              overflow: hidden;
                                            }
                                    
                                            .desktop_hide,
                                            .desktop_hide table {
                                              max-height: none !important;
                                              display: table !important;
                                            }
                                          }
                                        </style>
                                        <link
                                          rel="stylesheet"
                                          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
                                        />
                                     
                                      <body>
                                        <table
                                          border="0"
                                          cellpadding="0"
                                          cellspacing="0"
                                          class="nl-container"
                                          role="presentation"
                                          style="
                                            mso-table-lspace: 0pt;
                                            mso-table-rspace: 0pt;
                                            background-color: #fff;
                                          "
                                          width="100%"
                                        >
                                          <tbody>
                                            <tr>
                                              <td>
                                                <table
                                                  align="center"
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="row row-1"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    background-color: #f7f6f5;
                                                  "
                                                  width="100%"
                                                >
                                                  <tbody>
                                                    <tr>
                                                      <td></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table
                                                  align="center"
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="row row-2"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    background-color: #f7f6f5;
                                                  "
                                                  width="100%"
                                                >
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table
                                                          align="center"
                                                          border="0"
                                                          cellpadding="0"
                                                          cellspacing="0"
                                                          class="row-content stack"
                                                          role="presentation"
                                                          style="
                                                            mso-table-lspace: 0pt;
                                                            mso-table-rspace: 0pt;
                                                            color: #000;
                                                            background-color: #fff;
                                                            width: 600px;
                                                            margin: 0 auto;
                                                          "
                                                          width="600"
                                                        >
                                                          <tbody>
                                                            <tr>
                                                              <td
                                                                class="column column-1"
                                                                style="
                                                                  mso-table-lspace: 0pt;
                                                                  mso-table-rspace: 0pt;
                                                                  text-align: left;
                                                                  font-weight: 400;
                                                                  vertical-align: top;
                                                                  border-top: 0px;
                                                                  border-right: 0px;
                                                                  border-bottom: 0px;
                                                                  border-left: 0px;
                                                                "
                                                                width="100%"
                                                              >
                                                                <div
                                                                  class="spacer_block block-1"
                                                                  style="
                                                                    height: 20px;
                                                                    line-height: 20px;
                                                                    font-size: 1px;
                                                                  "
                                                                >
                                                                   
                                                                </div>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="image_block block-2"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td
                                                                      class="pad"
                                                                      style="
                                                                        width: 100%;
                                                                        padding-right: 0px;
                                                                        padding-left: 0px;
                                                                      "
                                                                    >
                                                                      <div
                                                                        align="center"
                                                                        class="alignment"
                                                                        style="line-height: 10px"
                                                                      >
                                                                        <img
                                                                          alt="Paramount Hospital Pvt. Ltd."
                                                                          src="https://appt.paramounthospital.in/website/assets/images/logo.png"
                                                                          style="
                                                                            height: auto;
                                                                            display: block;
                                                                            border: 0;
                                                                            max-width: 250px;
                                                                            width: 100%;
                                                                          "
                                                                          title="Paramount Hospital Logo"
                                                                          width="150"
                                                                        />
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <div
                                                                  class="spacer_block block-3"
                                                                  style="
                                                                    height: 20px;
                                                                    line-height: 20px;
                                                                    font-size: 1px;
                                                                  "
                                                                >
                                                                  
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table
                                                  align="center"
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="row row-3"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    background-color: #f7f6f5;
                                                  "
                                                  width="100%"
                                                >
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table
                                                          align="center"
                                                          border="0"
                                                          cellpadding="0"
                                                          cellspacing="0"
                                                          class="row-content stack"
                                                          role="presentation"
                                                          style="
                                                            mso-table-lspace: 0pt;
                                                            mso-table-rspace: 0pt;
                                                            color: #000;
                                                            background-color: #fff;
                                                            width: 600px;
                                                            margin: 0 auto;
                                                          "
                                                          width="600"
                                                        >
                                                          <tbody>
                                                            <tr>
                                                              <td
                                                                class="column column-1"
                                                                style="
                                                                  mso-table-lspace: 0pt;
                                                                  mso-table-rspace: 0pt;
                                                                  text-align: left;
                                                                  font-weight: 400;
                                                                  vertical-align: top;
                                                                  border-top: 0px;
                                                                  border-right: 0px;
                                                                  border-bottom: 0px;
                                                                  border-left: 0px;
                                                                "
                                                                width="100%"
                                                              >
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="image_block block-1"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td class="pad" style="width: 100%">
                                                                      <div
                                                                        align="center"
                                                                        class="alignment"
                                                                        style="line-height: 10px"
                                                                      >
                                                                        <img
                                                                          alt="Paramount Hospital "
                                                                          src="https://appt.paramounthospital.in/website/assets/images/paramount.webp"
                                                                          style="
                                                                            height: auto;
                                                                            display: block;
                                                                            border: 0;
                                                                            max-width: 600px;
                                                                            width: 100%;
                                                                          "
                                                                          title="Paramount Hospital "
                                                                          width="600"
                                                                        />
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <div
                                                                  class="spacer_block block-2"
                                                                  style="
                                                                    height: 35px;
                                                                    line-height: 35px;
                                                                    font-size: 1px;
                                                                  "
                                                                >
                                                                   
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table
                                                  align="center"
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="row row-4"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    background-color: #f7f6f5;
                                                  "
                                                  width="100%"
                                                >
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table
                                                          align="center"
                                                          border="0"
                                                          cellpadding="0"
                                                          cellspacing="0"
                                                          class="row-content stack"
                                                          role="presentation"
                                                          style="
                                                            mso-table-lspace: 0pt;
                                                            mso-table-rspace: 0pt;
                                                            color: #000;
                                                            background-color: #fff;
                                                            width: 600px;
                                                            margin: 0 auto;
                                                          "
                                                          width="600"
                                                        >
                                                          <tbody>
                                                            <tr>
                                                              <td
                                                                class="column column-1"
                                                                style="
                                                                  mso-table-lspace: 0pt;
                                                                  mso-table-rspace: 0pt;
                                                                  text-align: left;
                                                                  font-weight: 400;
                                                                  vertical-align: top;
                                                                  border-top: 0px;
                                                                  border-right: 0px;
                                                                  border-bottom: 0px;
                                                                  border-left: 0px;
                                                                "
                                                                width="100%"
                                                              >
                                                                <div
                                                                  class="spacer_block block-1"
                                                                  style="
                                                                    height: 30px;
                                                                    line-height: 30px;
                                                                    font-size: 1px;
                                                                  "
                                                                >
                                                                   
                                                                </div>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="paragraph_block block-2"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                    word-break: break-word;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td
                                                                      class="pad"
                                                                      style="
                                                                        padding-bottom: 10px;
                                                                        padding-left: 15px;
                                                                        padding-right: 15px;
                                                                        padding-top: 10px;
                                                                      "
                                                                    >
                                                                      <div>
                                                                        <p class="text">
                                                                          <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
                                                                        </p>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <div
                                                                  class="spacer_block block-3"
                                                                  style="
                                                                    height: 30px;
                                                                    line-height: 30px;
                                                                    font-size: 1px;
                                                                  "
                                                                >
                                                                   
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table
                                                  align="center"
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="row row-7"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    background-color: #f7f6f5;
                                                  "
                                                  width="100%"
                                                >
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table
                                                          align="center"
                                                          border="0"
                                                          cellpadding="0"
                                                          cellspacing="0"
                                                          class="row-content stack"
                                                          role="presentation"
                                                          style="
                                                            mso-table-lspace: 0pt;
                                                            mso-table-rspace: 0pt;
                                                            color: #000;
                                                            background-color: #f7f6f5;
                                                            width: 600px;
                                                            margin: 0 auto;
                                                          "
                                                          width="600"
                                                        >
                                                          <tbody>
                                                            <tr>
                                                              <td
                                                                class="column column-1"
                                                                style="
                                                                  mso-table-lspace: 0pt;
                                                                  mso-table-rspace: 0pt;
                                                                  text-align: left;
                                                                  font-weight: 400;
                                                                  padding-bottom: 5px;
                                                                  padding-top: 5px;
                                                                  vertical-align: top;
                                                                  border-top: 0px;
                                                                  border-right: 0px;
                                                                  border-bottom: 0px;
                                                                  border-left: 0px;
                                                                "
                                                                width="100%"
                                                              >
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="html_block block-1"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td class="pad">
                                                                      <div
                                                                        align="center"
                                                                        style="
                                                                          font-family: Arial, Helvetica Neue,
                                                                            Helvetica, sans-serif;
                                                                          text-align: center;
                                                                        "
                                                                      >
                                                                        <div style="height: 30px"> </div>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="image_block block-2"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td
                                                                      class="pad"
                                                                      style="
                                                                        width: 100%;
                                                                        padding-right: 0px;
                                                                        padding-left: 0px;
                                                                      "
                                                                    >
                                                                      <div
                                                                        align="center"
                                                                        class="alignment"
                                                                        style="line-height: 10px"
                                                                      >
                                                                        <img
                                                                          alt="Paramount Hospital Logo"
                                                                          src="https://appt.paramounthospital.in/website/assets/images/logo.png"
                                                                          style="
                                                                            height: auto;
                                                                            display: block;
                                                                            border: 0;
                                                                            max-width: 250px;
                                                                            width: 100%;
                                                                          "
                                                                          title="Paramount Hospital Logo"
                                                                          width="120"
                                                                        />
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="html_block block-3"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td class="pad">
                                                                      <div
                                                                        align="center"
                                                                        style="
                                                                          font-family: Arial, Helvetica Neue,
                                                                            Helvetica, sans-serif;
                                                                          text-align: center;
                                                                        "
                                                                      >
                                                                        <div style="height: 30px"> </div>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="social_block block-4"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td
                                                                      class="pad"
                                                                      style="
                                                                        text-align: center;
                                                                        padding-right: 0px;
                                                                        padding-left: 0px;
                                                                      "
                                                                    >
                                                                      <div align="center" class="alignment">
                                                                        <table
                                                                          border="0"
                                                                          cellpadding="0"
                                                                          cellspacing="0"
                                                                          class="social-table"
                                                                          role="presentation"
                                                                          style="
                                                                            mso-table-lspace: 0pt;
                                                                            mso-table-rspace: 0pt;
                                                                            display: inline-block;
                                                                          "
                                                                         
                                                                        >
                                                                          <tr>
                                                                            <td style="padding: 0 5px 0 5px">
                                                                              <a
                                                                                href="https://www.facebook.com/paramounthospitalslg"
                                                                                target="_blank"
                                                                                ><i
                                                                                  class="fa-brands fa-facebook"
                                                                                ></i
                                                                              ></a>
                                                                            </td>
                                                                            <td style="padding: 0 5px 0 5px">
                                                                              <a
                                                                                href="https://www.instagram.com/paramounthospitalslg/"
                                                                                target="_blank"
                                                                                ><i class="fa-brands fa-instagram"></i></a>
                                                                            </td>
                                                                            <td style="padding: 0 5px 0 5px">
                                                                              <a
                                                                                href="https://www.youtube.com/@ParamountHospitalslg"
                                                                                target="_blank"
                                                                                ><i class="fa-brands fa-youtube"></i
                                                                              ></a>
                                                                            </td>
                                                                          </tr>
                                                                        </table>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="html_block block-5"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td class="pad">
                                                                      <div
                                                                        align="center"
                                                                        style="
                                                                          font-family: Arial, Helvetica Neue,
                                                                            Helvetica, sans-serif;
                                                                          text-align: center;
                                                                        "
                                                                      >
                                                                        <div style="height: 30px"> </div>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table
                                                  align="center"
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  class="row row-8"
                                                  role="presentation"
                                                  style="
                                                    mso-table-lspace: 0pt;
                                                    mso-table-rspace: 0pt;
                                                    background-color: #f7f6f5;
                                                  "
                                                  width="100%"
                                                >
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <table
                                                          align="center"
                                                          border="0"
                                                          cellpadding="0"
                                                          cellspacing="0"
                                                          class="row-content stack"
                                                          role="presentation"
                                                          style="
                                                            mso-table-lspace: 0pt;
                                                            mso-table-rspace: 0pt;
                                                            color: #000;
                                                            background-color: #072b52;
                                                            width: 600px;
                                                            margin: 0 auto;
                                                          "
                                                          width="600"
                                                        >
                                                          <tbody>
                                                            <tr>
                                                              <td
                                                                class="column column-1"
                                                                style="
                                                                  mso-table-lspace: 0pt;
                                                                  mso-table-rspace: 0pt;
                                                                  text-align: left;
                                                                  font-weight: 400;
                                                                  padding-bottom: 5px;
                                                                  padding-top: 5px;
                                                                  vertical-align: top;
                                                                  border-top: 0px;
                                                                  border-right: 0px;
                                                                  border-bottom: 0px;
                                                                  border-left: 0px;
                                                                "
                                                                width="100%"
                                                              >
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="paragraph_block block-1"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                    word-break: break-word;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td
                                                                      class="pad"
                                                                      style="
                                                                        padding-left: 10px;
                                                                        padding-right: 10px;
                                                                        padding-top: 10px;
                                                                      "
                                                                    >
                                                                      <div
                                                                        style="
                                                                          color: #f7f6f5;
                                                                          font-family: Lato, Tahoma, Verdana,
                                                                            Segoe, sans-serif;
                                                                          font-size: 12px;
                                                                          line-height: 120%;
                                                                          text-align: left;
                                                                          mso-line-height-alt: 14.399999999999999px;
                                                                        "
                                                                      >
                                                                        <p
                                                                          style="margin: 0; word-break: break-word"
                                                                        >
                                                                           
                                                                        </p>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                <table
                                                                  border="0"
                                                                  cellpadding="0"
                                                                  cellspacing="0"
                                                                  class="paragraph_block block-2"
                                                                  role="presentation"
                                                                  style="
                                                                    mso-table-lspace: 0pt;
                                                                    mso-table-rspace: 0pt;
                                                                    word-break: break-word;
                                                                  "
                                                                  width="100%"
                                                                >
                                                                  <tr>
                                                                    <td
                                                                      class="pad"
                                                                      style="
                                                                        padding-bottom: 10px;
                                                                        padding-left: 10px;
                                                                        padding-right: 10px;
                                                                      "
                                                                    >
                                                                      <div
                                                                        style="
                                                                          color: #f7f6f5;
                                                                          font-family: Lato, Tahoma, Verdana,
                                                                            Segoe, sans-serif;
                                                                          font-size: 12px;
                                                                          line-height: 120%;
                                                                          text-align: center;
                                                                          mso-line-height-alt: 14.399999999999999px;
                                                                        "
                                                                      >
                                                                        <p
                                                                          style="margin: 0; word-break: break-word"
                                                                        >
                                                                          <span style="color: #c0c0c0"
                                                                            ><br /><br
                                                                          /></span>
                                                                        </p>
                                                                        <p
                                                                          style="margin: 0; word-break: break-word"
                                                                        >
                                                                          © Copyright 2023. Paramount Hospital Pvt. Ltd. All Rights
                                                                          Reserved.
                                                                        </p>
                                                                        <p
                                                                          style="margin: 0; word-break: break-word"
                                                                        >
                                                                          <a
                                                                            href="https://www.paramounthospital.in/about-us/"
                                                                            rel="noopener"
                                                                            style="color: #f7f6f5"
                                                                            target="_blank"
                                                                            title="https://www.paramounthospital.in/about-us/"
                                                                            >About Us</a
                                                                          >
                                                                          |
                                                                          <a
                                                                            href="https://paramounthospital.in"
                                                                            rel="noopener"
                                                                            style="color: #f7f6f5"
                                                                            target="_blank"
                                                                            title=""
                                                                            >Unsubscribe</a
                                                                          >
                                                                        </p>
                                                                        <p
                                                                          style="margin: 0; word-break: break-word"
                                                                        >
                                                                          <span style="color: #c0c0c0"> </span>
                                                                        </p>
                                                                      </div>
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </body>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <center>
                                <button type="submit" class="btn btn-default waves-effect m-r-20" name="save" style="background-color:#2d51e0; color:#198754">
                                    <i class="fa-solid fa-paper-plane"></i> SEND
                                </button>
                                
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
// Include the PHPMailer library
require '../../website/smtp/PHPMailerAutoload.php';

if(isset($_POST['save'])){
    $subject = $_POST['subject'];
    $compose = $_POST['compose'];
    
    $sql ="SELECT * FROM `subscribe` WHERE is_verified = 1";
    $res = mysqli_query($conn, $sql);

    // Create an array to store email addresses
    $emailAddresses = array();

    while($row = mysqli_fetch_assoc($res)){
        $emailAddresses[] = $row['email'];
    }
    
    // Counter for successful emails
    $successCount = 0;

    // Loop through email addresses and send emails
    foreach ($emailAddresses as $email) {
        $result = smtp_mailer($email, $subject, $compose);
        if ($result) {
            $successCount++;
        }
    }

    // Display an alert after all emails are sent
        echo "<script>";
        if ($successCount > 0) {
            echo 'swal("Success", "' . $successCount . ' emails sent successfully.", "success");';
        } else {
            echo 'swal("Error", "Failed to send emails.", "error");';
        }
        echo "</script>";

}

// Function to send mail using SMTP
function smtp_mailer($email, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "mail.paramounthospital.in";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "noreply@paramounthospital.in";
    $mail->Password = "BJk6X2O~D?&a";
    $mail->SetFrom("noreply@paramounthospital.in");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($email);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false,
        )
    );
    
    if (!$mail->Send()) {
        return false; // Return false on failure
    } else {
        return true; // Return true on success
    }
}

// Close the database connection (make sure to close it properly in your code)
mysqli_close($conn);
?>



<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
    });
</script>

<script>
        // Function to fetch data and update the table
        function fetchData() {
            $.ajax({
                url: "load/get_newsletters.php", // Your PHP file to fetch data
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var html = '';
                    $.each(data, function (index, item) {
                        var statusHtml = item.is_verified == '1' ?
                            "<button class='btn btn-sm bg-cyan waves-effect' type='button'>Verified <span class='badge'></span></button>" :
                            "<button class='btn btn-sm bg-red waves-effect' type='button'>Pending <span class='badge'></span></button>";

                        // Convert date format from "28 18:00:00-07-2023" to "28-07-2023"
                        var dateTimeParts = item.date.split(" ");
                        var dateParts = dateTimeParts[0].split("-");
                        var apptDateFormatted = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];

                        html += '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + item.email + '</td>' +
                            '<td>' + item.token + '</td>' +
                            '<td>' + apptDateFormatted + '</td>' +
                            '<td>' + statusHtml + '</td>' +
                            '</tr>';
                    });

                    // Update the table body with the new data
                    $('table.table tbody').html(html);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Call the fetchData function initially to populate the table
        fetchData();

        // Set an interval to fetch data and update the table every few seconds (e.g., 5 seconds)
        setInterval(fetchData, 5000); // Adjust the interval as needed
    </script>


<?php include 'footer.php'?>