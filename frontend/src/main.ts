import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';

import { AppModule } from './app/app.module';
import axios from 'axios';
import { environment } from './environments/environment.development';

axios.defaults.baseURL = environment.apiUrl

axios.interceptors.request.use(function (config) {
  return config;
});

platformBrowserDynamic().bootstrapModule(AppModule, {
  ngZoneEventCoalescing: true
})
  .catch(err => console.error(err));
