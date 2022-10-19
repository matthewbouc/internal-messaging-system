import {createApi, fetchBaseQuery} from '@reduxjs/toolkit/query/react';

import {MessageObjectState} from "../reducers/messageSlice";

const BASE_URL = "http://localhost:8000/api";

interface PostMessage {
    groupId: number,
    author: number,
    message: string,
}

export const messageApi = createApi({
    reducerPath: 'messageApi',
    baseQuery: fetchBaseQuery({baseUrl: BASE_URL}),
    endpoints: (builder) => ({
        getMessages: builder.query<MessageObjectState, number>({
            query: (groupId) => `/groupMessages/${groupId}`
        }),
        addMessage: builder.mutation<void, PostMessage>({
            query: (message) => ({
                url: '/messages',
                method: 'POST',
                body: message,
            })
        }),
    })
});

export const {useGetMessagesQuery, useAddMessageMutation} = messageApi;