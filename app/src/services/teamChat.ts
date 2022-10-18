import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

import { GroupObjectState } from "../reducers/groupSlice";

const BASE_URL = "http://localhost:8000/api";

export const groupApi = createApi({
    reducerPath: 'groupApi',
    baseQuery: fetchBaseQuery({baseUrl: BASE_URL}),
    endpoints: builder => ({
        getGroup: builder.query<GroupObjectState, undefined>({
            query: () => "/userGroups/1"
        }),
        deleteGroup: builder.mutation<void, number|null>({
            query: (userGroupId)=>({
                url: `/groups/${userGroupId}`,
                method: 'DELETE',
                body: userGroupId
            })
        }),
    })
});

export const { useGetGroupQuery, useDeleteGroupMutation } = groupApi;