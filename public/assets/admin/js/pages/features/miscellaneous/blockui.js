"use strict";var KTBlockUIDemo={init:function(){$("#kt_blockui_default").click((function(){KTApp.block("#kt_blockui_content",{}),setTimeout((function(){KTApp.unblock("#kt_blockui_content")}),2e3)})),$("#kt_blockui_overlay_color").click((function(){KTApp.block("#kt_blockui_content",{overlayColor:"red",opacity:.1,state:"primary"}),setTimeout((function(){KTApp.unblock("#kt_blockui_content")}),2e3)})),$("#kt_blockui_custom_spinner").click((function(){KTApp.block("#kt_blockui_content",{overlayColor:"#000000",state:"warning",size:"lg"}),setTimeout((function(){KTApp.unblock("#kt_blockui_content")}),2e3)})),$("#kt_blockui_custom_text_1").click((function(){KTApp.block("#kt_blockui_content",{overlayColor:"#000000",state:"danger",message:"Please wait..."}),setTimeout((function(){KTApp.unblock("#kt_blockui_content")}),2e3)})),$("#kt_blockui_custom_text_2").click((function(){KTApp.block("#kt_blockui_content",{overlayColor:"#000000",state:"primary",message:"Processing..."}),setTimeout((function(){KTApp.unblock("#kt_blockui_content")}),2e3)})),$("#kt_blockui_modal_default_btn").click((function(){KTApp.block("#kt_blockui_modal_default .modal-dialog",{}),setTimeout((function(){KTApp.unblock("#kt_blockui_modal_default .modal-content")}),2e3)})),$("#kt_blockui_modal_overlay_color_btn").click((function(){KTApp.block("#kt_blockui_modal_overlay_color .modal-content",{overlayColor:"red",opacity:.1,state:"primary"}),setTimeout((function(){KTApp.unblock("#kt_blockui_modal_overlay_color .modal-content")}),2e3)})),$("#kt_blockui_modal_custom_spinner_btn").click((function(){KTApp.block("#kt_blockui_modal_custom_spinner .modal-content",{overlayColor:"#000000",state:"warning",size:"lg"}),setTimeout((function(){KTApp.unblock("#kt_blockui_modal_custom_spinner .modal-content")}),2e3)})),$("#kt_blockui_modal_custom_text_1_btn").click((function(){KTApp.block("#kt_blockui_modal_custom_text_1 .modal-content",{overlayColor:"#000000",state:"danger",message:"Please wait..."}),setTimeout((function(){KTApp.unblock("#kt_blockui_modal_custom_text_1 .modal-content")}),2e3)})),$("#kt_blockui_modal_custom_text_2_btn").click((function(){KTApp.block("#kt_blockui_modal_custom_text_2 .modal-content",{overlayColor:"#000000",state:"primary",message:"Processing..."}),setTimeout((function(){KTApp.unblock("#kt_blockui_modal_custom_text_2 .modal-content")}),2e3)})),$("#kt_blockui_card_default").click((function(){KTApp.block("#kt_blockui_card"),setTimeout((function(){KTApp.unblock("#kt_blockui_card")}),2e3)})),$("#kt_blockui_card_overlay_color").click((function(){KTApp.block("#kt_blockui_card",{overlayColor:"red",opacity:.1,state:"primary"}),setTimeout((function(){KTApp.unblock("#kt_blockui_card")}),2e3)})),$("#kt_blockui_card_custom_spinner").click((function(){KTApp.block("#kt_blockui_card",{overlayColor:"#000000",state:"warning",size:"lg"}),setTimeout((function(){KTApp.unblock("#kt_blockui_card")}),2e3)})),$("#kt_blockui_card_custom_text_1").click((function(){KTApp.block("#kt_blockui_card",{overlayColor:"#000000",state:"danger",message:"Please wait..."}),setTimeout((function(){KTApp.unblock("#kt_blockui_card")}),2e3)})),$("#kt_blockui_card_custom_text_2").click((function(){KTApp.block("#kt_blockui_card",{overlayColor:"#000000",state:"primary",message:"Processing..."}),setTimeout((function(){KTApp.unblock("#kt_blockui_card")}),2e3)})),$("#kt_blockui_page_default").click((function(){KTApp.blockPage(),setTimeout((function(){KTApp.unblockPage()}),2e3)})),$("#kt_blockui_page_overlay_color").click((function(){KTApp.blockPage({overlayColor:"red",opacity:.1,state:"primary"}),setTimeout((function(){KTApp.unblockPage()}),2e3)})),$("#kt_blockui_page_custom_spinner").click((function(){KTApp.blockPage({overlayColor:"#000000",state:"warning",size:"lg"}),setTimeout((function(){KTApp.unblockPage()}),2e3)})),$("#kt_blockui_page_custom_text_1").click((function(){KTApp.blockPage({overlayColor:"#000000",state:"danger",message:"Please wait..."}),setTimeout((function(){KTApp.unblockPage()}),2e3)})),$("#kt_blockui_page_custom_text_2").click((function(){KTApp.blockPage({overlayColor:"#000000",state:"primary",message:"Processing..."}),setTimeout((function(){KTApp.unblockPage()}),2e3)}))}};jQuery(document).ready((function(){KTBlockUIDemo.init()}));
//# sourceMappingURL=blockui.js.map