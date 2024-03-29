<?php

namespace BaglanS\Doma\Helpers\Queries;

class OrganizationQuery
{
    public static function allOrganizationsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: OrganizationWhereInput) {
                allOrganizations (where: $where) {
                    id
                    name
                    tin
                    description
                    createdAt
                    updatedAt
                }
            }
        GRAPHQL;
    }

    public static function allContactsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: ContactWhereInput) {
                allContacts (where: $where) {
                    id
                    name
                    phone
                    email
                    property {
                      id
                      address
                      unitsCount
                      map {
                        sections {
                            id
                            index
                            name
                            floors {
                                id
                                name
                                units {
                                    id
                                    name
                                    label
                                    unitType
                                }
                            }
                        }
                      }
                    }
                    unitName
                    unitType
                    isVerified
                }
            }
        GRAPHQL;
    }
    
    public static function allOrganizationEmployeesQuery()
    {
        return <<<'GRAPHQL'
            query ($where: OrganizationEmployeeWhereInput) {
                allOrganizationEmployees (where: $where) {
                    id
                    name
                    __typename
                    user {
                      id
                      name
                      __typename
                    }
                    organization {
                      id
                      name
                      __typename
                    }
                    role {
                      id
                      name
                      __typename
                      canManageTickets
                      canManageRoles
                      canManageContacts
                      canManageOrganization
                      canManageProperties
                    }
                }
            }
        GRAPHQL;
    }
    
    public static function allB2BAppsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: B2BAppWhereInput) {
                allB2BApps (where: $where) {
                    id
                    name
                }
            }
        GRAPHQL;
    }

    public static function allB2CAppsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: B2CAppWhereInput) {
                allB2CApps (where: $where) {
                    id
                    name
                }
            }
        GRAPHQL;
    }
}
