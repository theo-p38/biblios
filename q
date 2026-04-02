[1mdiff --git a/templates/admin/author/index.html.twig b/templates/admin/author/index.html.twig[m
[1mindex 41221be..305d37c 100644[m
[1m--- a/templates/admin/author/index.html.twig[m
[1m+++ b/templates/admin/author/index.html.twig[m
[36m@@ -16,7 +16,7 @@[m
                     <div class="card mb-3 shadow-sm border-0">[m
                         <div class="card-body d-flex justify-content-between align-items-center">[m
                             <div>[m
[31m-                                <a href="{{ path('app_admin_author_show', {id: author.id}) }}" class="stretched-link link-dark">[m
[32m+[m[32m                                <a href="{{ path('app_admin_author_show', {id: author.id}) }}" class="stretched-link link-dark text-decoration-none">[m
                                     <h4 class="mb-1">{{ author.name }}</h4>[m
                                 </a>[m
                             </div>[m
