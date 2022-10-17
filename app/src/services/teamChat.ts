import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

import { GroupObjectState } from "../reducers/groupSlice";

const BASE_URL = "http://localhost:8000/api/userGroups";

export const groupApi = createApi({
    reducerPath: 'groupApi',
    baseQuery: fetchBaseQuery({baseUrl: BASE_URL}),
    endpoints: builder => ({
        getGroup: builder.query<GroupObjectState, undefined>({
            query: () => "/1"
        })
    })
});

export const { useGetGroupQuery } = groupApi;