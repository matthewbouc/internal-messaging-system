import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

import { GroupObjectState } from "../reducers/groupSlice";
import {MessageObjectState} from "../reducers/messageSlice";

const BASE_URL = "http://localhost:8000/api/groupMessages";

export const messageApi = createApi({
    reducerPath: 'messageApi',
    baseQuery: fetchBaseQuery({baseUrl: BASE_URL}),
    endpoints: builder => ({
        getMessages: builder.query<MessageObjectState, number>({
            query: (groupId) => `/${groupId}`
        })
    })
});

export const { useGetMessagesQuery } = messageApi;