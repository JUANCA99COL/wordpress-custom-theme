<?php
 namespace MailPoetVendor\Egulias\EmailValidator\Exception; if (!defined('ABSPATH')) exit; class CharNotAllowed extends \MailPoetVendor\Egulias\EmailValidator\Exception\InvalidEmail { const CODE = 201; const REASON = "Non allowed character in domain"; } 