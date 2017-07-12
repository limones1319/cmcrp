<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.6                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2015                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2015
 *
 * Generated from xml/schema/CRM/Member/Membership.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Member_DAO_Membership extends CRM_Core_DAO {
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_membership';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Membership Id
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to Contact ID
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * FK to Membership Type
   *
   * @var int unsigned
   */
  public $membership_type_id;
  /**
   * Beginning of initial membership period (member since...).
   *
   * @var date
   */
  public $join_date;
  /**
   * Beginning of current uninterrupted membership period.
   *
   * @var date
   */
  public $start_date;
  /**
   * Current membership period expire date.
   *
   * @var date
   */
  public $end_date;
  /**
   *
   * @var string
   */
  public $source;
  /**
   * FK to Membership Status
   *
   * @var int unsigned
   */
  public $status_id;
  /**
   * Admin users may set a manual status which overrides the calculated status. When this flag is true, automated status update scripts should NOT modify status for the record.
   *
   * @var boolean
   */
  public $is_override;
  /**
   * Optional FK to Parent Membership.
   *
   * @var int unsigned
   */
  public $owner_membership_id;
  /**
   * Maximum number of related memberships (membership_type override).
   *
   * @var int
   */
  public $max_related;
  /**
   *
   * @var boolean
   */
  public $is_test;
  /**
   *
   * @var boolean
   */
  public $is_pay_later;
  /**
   * Conditional foreign key to civicrm_contribution_recur id. Each membership in connection with a recurring contribution carries a foreign key to the recurring contribution record. This assumes we can track these processor initiated events.
   *
   * @var int unsigned
   */
  public $contribution_recur_id;
  /**
   * The campaign for which this membership is attached.
   *
   * @var int unsigned
   */
  public $campaign_id;
  /**
   * class constructor
   *
   * @return civicrm_membership
   */
  function __construct() {
    $this->__table = 'civicrm_membership';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'membership_type_id', 'civicrm_membership_type', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'status_id', 'civicrm_membership_status', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'owner_membership_id', 'civicrm_membership', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contribution_recur_id', 'civicrm_contribution_recur', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'campaign_id', 'civicrm_campaign', 'id');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'membership_id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership ID') ,
          'description' => 'Membership Id',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_membership.id',
          'headerPattern' => '/^(m(embership\s)?id)$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'membership_contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID') ,
          'description' => 'FK to Contact ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_membership.contact_id',
          'headerPattern' => '/contact(.?id)?/i',
          'dataPattern' => '/^\d+$/',
          'export' => true,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'html' => array(
            'type' => 'Autocomplete-Select',
          ) ,
        ) ,
        'membership_type_id' => array(
          'name' => 'membership_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Type Id') ,
          'description' => 'FK to Membership Type',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_membership.membership_type_id',
          'headerPattern' => '/^(m(embership\s)?type)$/i',
          'dataPattern' => '',
          'export' => false,
          'FKClassName' => 'CRM_Member_DAO_MembershipType',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_membership_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'join_date' => array(
          'name' => 'join_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Member Since') ,
          'description' => 'Beginning of initial membership period (member since...).',
          'import' => true,
          'where' => 'civicrm_membership.join_date',
          'headerPattern' => '/^join|(j(oin\s)?date)$/i',
          'dataPattern' => '/\d{4}-?\d{2}-?\d{2}/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'membership_start_date' => array(
          'name' => 'start_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Membership Start Date') ,
          'description' => 'Beginning of current uninterrupted membership period.',
          'import' => true,
          'where' => 'civicrm_membership.start_date',
          'headerPattern' => '/(member(ship)?.)?start(s)?(.date$)?/i',
          'dataPattern' => '/\d{4}-?\d{2}-?\d{2}/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'membership_end_date' => array(
          'name' => 'end_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Membership Expiration Date') ,
          'description' => 'Current membership period expire date.',
          'import' => true,
          'where' => 'civicrm_membership.end_date',
          'headerPattern' => '/(member(ship)?.)?end(s)?(.date$)?/i',
          'dataPattern' => '/\d{4}-?\d{2}-?\d{2}/',
          'export' => true,
          'html' => array(
            'type' => 'Select Date',
          ) ,
        ) ,
        'membership_source' => array(
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Source') ,
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_membership.source',
          'headerPattern' => '/^(member(ship?))?source$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'status_id' => array(
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Status Id') ,
          'description' => 'FK to Membership Status',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_membership.status_id',
          'headerPattern' => '/(member(ship|).)?(status)$/i',
          'dataPattern' => '',
          'export' => false,
          'FKClassName' => 'CRM_Member_DAO_MembershipStatus',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_membership_status',
            'keyColumn' => 'id',
            'labelColumn' => 'label',
          )
        ) ,
        'is_override' => array(
          'name' => 'is_override',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Status Override') ,
          'description' => 'Admin users may set a manual status which overrides the calculated status. When this flag is true, automated status update scripts should NOT modify status for the record.',
          'import' => true,
          'where' => 'civicrm_membership.is_override',
          'headerPattern' => '/override$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'owner_membership_id' => array(
          'name' => 'owner_membership_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Primary Member ID') ,
          'description' => 'Optional FK to Parent Membership.',
          'export' => true,
          'where' => 'civicrm_membership.owner_membership_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'FKClassName' => 'CRM_Member_DAO_Membership',
        ) ,
        'max_related' => array(
          'name' => 'max_related',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Max Related') ,
          'description' => 'Maximum number of related memberships (membership_type override).',
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'member_is_test' => array(
          'name' => 'is_test',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Test') ,
          'import' => true,
          'where' => 'civicrm_membership.is_test',
          'headerPattern' => '/(is.)?test(.member(ship)?)?/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'member_is_pay_later' => array(
          'name' => 'is_pay_later',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Pay Later') ,
          'import' => true,
          'where' => 'civicrm_membership.is_pay_later',
          'headerPattern' => '/(is.)?(pay(.)?later)$/i',
          'dataPattern' => '',
          'export' => true,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'contribution_recur_id' => array(
          'name' => 'contribution_recur_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Memberhip Recurring Contribution') ,
          'description' => 'Conditional foreign key to civicrm_contribution_recur id. Each membership in connection with a recurring contribution carries a foreign key to the recurring contribution record. This assumes we can track these processor initiated events.',
          'FKClassName' => 'CRM_Contribute_DAO_ContributionRecur',
        ) ,
        'member_campaign_id' => array(
          'name' => 'campaign_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign') ,
          'description' => 'The campaign for which this membership is attached.',
          'import' => true,
          'where' => 'civicrm_membership.campaign_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Campaign_DAO_Campaign',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_campaign',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          )
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys() {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'membership_id',
        'contact_id' => 'membership_contact_id',
        'membership_type_id' => 'membership_type_id',
        'join_date' => 'join_date',
        'start_date' => 'membership_start_date',
        'end_date' => 'membership_end_date',
        'source' => 'membership_source',
        'status_id' => 'status_id',
        'is_override' => 'is_override',
        'owner_membership_id' => 'owner_membership_id',
        'max_related' => 'max_related',
        'is_test' => 'member_is_test',
        'is_pay_later' => 'member_is_pay_later',
        'contribution_recur_id' => 'contribution_recur_id',
        'campaign_id' => 'member_campaign_id',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['membership'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['membership'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}