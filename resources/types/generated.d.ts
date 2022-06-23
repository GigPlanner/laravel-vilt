declare namespace Domains.Posts.DataTransferObjects {
  export type PostData = {
    title: string
    content: string
    status: Domains.Posts.Values.PostStatus
    published_at: string | null
  }
}
declare namespace Domains.Posts.Values {
  export type PostStatus = 'draft' | 'published'
}
declare namespace Domains.Posts.ViewModels {
  export type PostsViewModel = {
    posts: Array<Domains.Posts.DataTransferObjects.PostData>
    title: string
  }
}
declare namespace Domains.Shared.DataTransferObjects {
  export type MenuItem = {
    title: string
    link: Domains.Shared.Values.Link
    isActive: boolean
    children: Array<any>
  }
}
declare namespace Domains.Shared.Values {
  export type Link = {
    url: string
    isExternal: boolean
    isInertia: boolean
  }
}
declare namespace Domains.Shared.ViewModels {
  export type MenuViewModel = {
    items: Array<any>
  }
}
