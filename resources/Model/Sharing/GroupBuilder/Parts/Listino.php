<?php
/**
 * Listino is a group for listini sharing environment
 */
class Model_Sharing_GroupBuilder_Parts_Listino 
    extends Model_Sharing_GroupBuilder_Parts_Group
{
    /**
     * @return array
     */    
    public function dumpValuesForDB()
    {
        $ar = array(
            'idlistino'         => $this->getIdListino(),
            'idgroup_master'    => $this->getIdGroupMaster(),
            'idgroup_slave'     => $this->getIdGroup(),
            'valido_dal'        => $this->getValidita()->getDal(MyFw_Form_Filters_Date::_MYFORMAT_DATE_DB),
            'valido_al'         => $this->getValidita()->getAl(MyFw_Form_Filters_Date::_MYFORMAT_DATE_DB),
            'visibile'          => $this->getVisibile()->getString()
        );
        return $ar;
    }
    
}
